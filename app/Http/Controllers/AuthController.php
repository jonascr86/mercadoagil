<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Sentinel;
use Validator;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class AuthController extends ChandraController
{
    /**
     * Account sign in.
     *
     * @return View
     */
    public function getLogin()
    {
        if (Sentinel::check()) {
            return redirect()->route('dashboard');
        }

        return view('layouts.login');
    }

    /**
     * Account sign in form processing.
     *
     * @param Request $request
     * @return Redirect
     */
    public function postLogin(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            Sentinel::authenticate($request->only('email', 'password'), $request->get('remember-me', 0));

            return redirect()->route('dashboard');
        }
        catch (UserNotFoundException $e) {
            $this->messageBag->add('email', trans('auth/message.account_not_found'));
        }
        catch (NotActivatedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_not_activated'));
        }
        catch (UserSuspendedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_suspended'));
        }
        catch (UserBannedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_banned'));
        }
        catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', trans('auth/message.account_suspended', compact('delay')));
        }

        return redirect()->back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * Account Register.
     *
     * @return View
     */
    public function getRegister()
    {
        return view('admin.register');
    }

    /**
     * Account sign up form processing.
     *
     * @param Request $request
     * @return Redirect
     */
    public function postRegister(Request $request)
    {
        $rules = [
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'email_confirm'    => 'required|email|same:email',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $user = Sentinel::register(array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'phone' => $request->get('phone'),
                'dob' => $request->get('dob'),
                'country' => $request->get('country'),
                'address' => $request->get('address'),
                'zip' => $request->get('zip'),
                'gender' => $request->get('gender'),
                'subscribed' => $request->has('subscribed')
            ),true);

            $role = Sentinel::findRoleByName('User');
            $role->users()->attach($user);


            /*
            //un-comment below code incase if user have to activate manually

            // Data to be used on the email view
            $data = array(
                'user'          => $user,
                'activationUrl' => URL::route('activate',$user->id, Activation::create($user)->code),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });

            //Redirect to login page
            return Redirect::to("admin/login")->with('success', Lang::get('auth/message.signup.success'));

            */

            // login user automatically



            // Log the user in
            Sentinel::login($user, false);

            return redirect()->route("dashboard")->with('success', trans('auth/message.signup.success'));

        }
        catch (UserExistsException $e) {
            $this->messageBag->add('email', trans('auth/message.account_already_exists'));
        }

        return redirect()->back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return Redirect
     */
    public function getActivate($userId, $activationCode)
    {
        if (Sentinel::check()) {
            return redirect()->route('dashboard');
        }

        $user = Sentinel::findById($userId);

        if (Activation::complete($user, $activationCode)) {
            return redirect()->route('admin-login')->with('success', trans('auth/message.activate.success'));
        } else {
            return redirect()->route('admin-login')->with('error', trans('auth/message.activate.error'));
        }
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        return view('layouts/forgotpwd');
    }

    /**
     * Forgot password form processing page.
     *
     * @param Request $request
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#toforgot')->withInput()->withErrors($validator);
        }

        if ($user = User::where(['email' => $request->get('email')])->first()) {

            $r = \Reminder::create($user);

            $data = [
                'user' => $user,
                'forgotPasswordUrl' => url()->route('forgot-password-confirm', [$user->id, $r->code]),
            ];

            // Send the activation code through email
            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Recuperação de senha');
            });
        }

        return redirect()->to(url()->previous() . '#toforgot')->with('success', trans('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($user_id, $passwordResetCode = null)
    {
        if (!$user = Sentinel::findById($user_id)) {
            return redirect()->route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }

        if ( ! \Reminder::exists($user) ) {
            return redirect()->route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }
        
        return view('layouts.forgotpwd-confirm', compact('user_id', 'passwordResetCode'));
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param Request $request
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(Request $request, $user_id, $passwordResetCode = null)
    {
        $rules = [
            'password' => 'required|between:3,32',
            'password_confirm' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('forgot-password-confirm', [$user_id, $passwordResetCode])->withInput()->withErrors($validator);
        }

        if (!$user = Sentinel::findById($user_id)) {
            return redirect()->route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }

        if(!$reminder = \Reminder::complete($user, $passwordResetCode, $request->input('password'))){
            return redirect()->route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }

        return redirect()->route('admin-login')->with('success', trans('Senha alterada com sucesso.'));
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        Sentinel::logout();        
        return redirect()->to('login')->with('success', trans('auth/message.logout.success'));
    }

}
