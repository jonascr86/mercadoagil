<?php namespace App\Http\Controllers;

use Sentinel;
use Validator;
use Illuminate\Http\Request;

class GroupsController extends ChandraController
{
    /**
     * Show a list of all the groups.
     *
     * @return View
     */
    public function index()
    {
        $roles = Sentinel::getRoleRepository()->all();

        return view('users/groups/index', compact('roles'));
    }

    /**
     * Group create.
     *
     * @return View
     */
    public function create()
    {
        return view('users/groups/create');
    }

    /**
     * Group create form processing.
     *
     * @param Request $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:roles'
        ];

        $request->merge(['slug' => str_slug($request->get('name'))]);

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name'))
        ])) {
            return redirect()->route('user.group.index')->with('success', trans('groups/message.success.create'));
        }

        return redirect()->route('user.group.create')->with('error', trans('groups/message.error.create'));
    }

    /**
     * Group update.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id = null)
    {
        try {
            $role = Sentinel::findRoleById($id);
        }
        catch (GroupNotFoundException $e) {
            return redirect()->route('user.group.index')->with('error', trans('groups/message.group_not_found', compact('id')));
        }

        return view('users/groups/edit', compact('role'));
    }

    /**
     * Role update form processing page.
     *
     * @param Request  $request
     * @param  int  $id
     * @return Redirect
     */
    public function update(Request $request, $id = null)
    {
        if($role = Sentinel::findRoleById($id))
        {
            $rules = [
                'name' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $role->name = $request->get('name');

            if ($role->save()) {
                return redirect()->route('user.group.index')->with('success', trans('groups/message.success.update'));
            } else {
                return redirect()->back()->with('error', trans('groups/message.error.update'));
            }

        } else {
            return redirect()->back()->with('error', trans('groups/message.group_not_found', compact('id')));
        }

    }

    /**
     * Delete confirmation for the given group.
     *
     * @param  int $id
     * @return View
     */
    public function getModalDelete($id = null)
    {
        $model = 'groups';
        $confirm_route = $error = null;

        if($role = Sentinel::findRoleById($id)) {
            $confirm_route = route('delete/group',['id'=>$role->id]);
            return view('layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        else {
            $error = trans('admin/groups/message.group_not_found', compact('id'));
            return view('layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Delete the given group.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        if($role = Sentinel::findRoleById($id)) {
            $role->delete();
            return redirect()->route('groups')->with('success', trans('groups/message.success.delete'));
        }
        else {
            return redirect()->route('groups')->with('error', trans('groups/message.group_not_found', compact('id')));
        }
    }

}
