<?php

namespace App\Http\Controllers;

use URL;
use File;
use Hash;
use Lang;
use Mail;
use View;
use Redirect;
use Sentinel;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class UsersController extends ChandraController
{
    /**
     * Declare the rules for the form validation
     *
     * @var array
     */
    protected $validationRules = array(
        'first_name'       => 'required|min:3',
        'last_name'        => 'required|min:3',
        'email'            => 'required|email|unique:users,email',
        'password'         => 'required|between:3,32',
        'password_confirm' => 'required|same:password',
        'pic'              => 'mimes:jpg,jpeg,bmp,png|max:10000'
    );

    /**
     * Show a list of all the users.
     *
     * @param Return $request
     * @return View
     */
    public function getIndex(Request $request)
    {
        // Grab all the users
        $users = User::All();

        // Do we want to include the deleted users?
        if ($request->get('withTrashed')) {
            $users = User::withTrashed()->get();
        }
        elseif ($request->get('onlyTrashed')) {
            $users = User::onlyTrashed()->get();
        }

        // Show the page
        return View::make('users.index', compact('users'));
    }

    /**
     * User create.
     *
     * @return View
     */
    public function getCreate()
    {
        // Get all the available groups
        $roles = Sentinel::getRoleRepository()->all()->lists('name', 'id');

        // Show the page
        return View::make('users.create', compact('roles'));
    }

    /**
     * User create form processing.
     *
     * @param Request $request
     * @return Redirect
     */
    public function postCreate(Request $request)
    {
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $this->validationRules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //upload image
        if ($file = $request->file('pic'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);
        }

        //check whether use should be activated by default or not
        $activate = $request->get('activate') ? true : false;

        // Register the user
        $user = Sentinel::register([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'pic'           => isset($safeName)?$safeName:''
        ], $activate);


        //add user to 'User' group
        $role = Sentinel::findRoleById($request->get('group'));
        $role->users()->attach($user);

        //check for activation and send activation mail if not activated by default
        if (!$activate) {
            // Data to be used on the email view
            $data = [
                'user'          => $user,
                'activationUrl' => URL::route('activate', $user->id, Activation::create($user)->code),
            ];

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });
        }

        // Redirect to the home page with success menu
        return Redirect::route("users")->with('success', Lang::get('users/message.success.create'));
    }

    /**
     * User update.
     *
     * @param  int  $id
     * @return View
     */
    public function getEdit($id = null)
    {
        try {
            // Get the user information
            $user = Sentinel::findById($id);

            // Get this user roles
            $userRoles = $user->getRoles()->lists('slug', 'id');

            // Get a list of all the available groups
            $roles = Sentinel::getRoleRepository()->all()->lists('name', 'id');

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }
        // Show the page
        return View::make('users/edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * User update form processing page.
     *
     * @param Request $request
     * @param  int      $id
     * @return Redirect
     */
    public function postEdit(Request $request, $id = null)
    {
        try {
            // Get the user information
            $user = Sentinel::findById($id);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        //
        $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";

        // Do we want to update the user password?
        if (!$password = $request->get('password')) {
            unset($this->validationRules['password']);
            unset($this->validationRules['password_confirm']);
        }


        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $this->validationRules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Update the user
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');

        // Do we want to update the user password?
        if ($password) {
            $user->password = Hash::make($password);
        }

        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if(File::exists(public_path() . $folderName.$user->pic)) {
                File::delete(public_path() . $folderName.$user->pic);
            }

            //save new file path into db
            $user->pic   = $safeName;

        }

        // Get the current user groups
        $userRoles = $user->roles()->lists('id')->all();

        // Get the selected groups
        $selectedRoles = $request->get('group', array());
        if(!is_array($selectedRoles)){
            $selectedRoles = [$selectedRoles];
        }

        // Groups comparison between the groups the user currently
        // have and the groups the user wish to have.
        $rolesToAdd    = array_diff($selectedRoles, $userRoles);
        $rolesToRemove = array_diff($userRoles, $selectedRoles);

        // Assign roles to user
        foreach ($rolesToAdd as $roleId) {
            $role = Sentinel::findRoleById($roleId);

            $role->users()->attach($user);
        }

        // Remove roles to user
        foreach ($rolesToRemove as $roleId) {
            $role = Sentinel::findRoleById($roleId);

            $role->users()->detach($user);

        }

        //skip activation/deactiavtion for  self user update
        if ($user->id === Sentinel::getUser()->id) {
            // Was the user updated?
            if ($user->save()) {
                // Redirect to the user page
                return Redirect::route('users')->with('success', 'Usuário atualizado com sucesso');
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');


            // Redirect to the user page
            return Redirect::route('users')->withInput()->with('error', $error);
        }

        // Activate / De-activate other user
        $status = $activation = Activation::completed($user);


        if ($request->get('activate') != $status)
        {
            if ($request->get('activate'))
            {
                $activation = Activation::exists($user);
                if($activation)
                {
                    Activation::complete($user, $activation->code);
                }
            }
            else
            {
                //remove existing activation record
                Activation::remove($user);
                //add new record
                Activation::create($user);

                //send activation mail
                $data = array(
                    'user'          => $user,
                    'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                );

                // Send the activation code through email
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Welcome ' . $user->first_name);
                });

            }
        }

        // Was the user updated?
        if ($user->save()) {
            // Redirect to the user page
            return Redirect::route('users')->with('success', 'Usuário atualizado com sucesso');
        }

        // Prepare the error message
        $error = Lang::get('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('users')->withInput()->with('error', $error);
    }


    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id)  {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View::make('layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id' ));
            return View::make('layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route =  URL::route('delete/user', array('id'=>$user->id));
        return View::make('layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getDelete($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('users')->with('error', $error);
            }

            // Delete the user
            //to allow soft delete, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Redirect to the user management page
            return Redirect::route('users')->with('success', 'Usuário excluído com sucesso');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id' ));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        // Show the page
        return View::make('users.show', compact('user'));

    }


}
