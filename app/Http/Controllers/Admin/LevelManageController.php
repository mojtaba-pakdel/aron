<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelManageController extends Controller
{
    public function index(){
        $roles = Role::latest()->with('users')->get();
        return view('Admin.levelAdmins.all' , compact('roles'));
    }

    public function create()
    {
        $roles = Role::latest()->with('users')->get();
        $users = User::whereLevel('Admin')->get();
        return view('Admin.levelAdmins.create', compact('roles','users'));
    }
    public function store(Request $request)
    {
        $this->validate($request , [
           'user_id' => 'required',
           'role_id' => 'required'
        ]);
        User::find($request->input('user_id'))->roles()->sync($request->input('role_id'));
        return back();

    }

    public function edit(User $user)
    {
        $roles = Role::latest()->with('users')->get();
        return view('Admin.levelAdmins.edit' , compact('user','roles'));
    }

    public function update(Request $request , User $user)
    {
        $user->roles()->sync($request->input('role_id'));
        return back();
    }
    public function show(User $user)
    {
        return $user;
    }
    public function destroy(User $user)
    {
        $user->roles()->detach();
       return response()->json([
           'status'=>1
       ]);
    }
}
