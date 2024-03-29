<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('Admin.users.all' , compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'status'=>1
        ]);
    }
}
