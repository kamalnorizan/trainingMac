<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        $roles = Role::pluck('name','name');
        return view('users.index',compact('users','roles'));
    }

    public function createrole(Request $request)
    {
        Role::create(['name'=> $request->role]);
        flash('Role created successfully')->success()->important();
        return redirect('/user');
    }
}
