<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('pages-login');
    }
    public function logout()
    {
        return view('index');
    }
    public function listadmin()
    {
        $admin = Admin::with('role')->get();
        return view('admin',compact('admin'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin-handell',compact('roles'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'role_id'=>'required'
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt('$request->password') ;
        $admin->role_id = $request->role_id;
        $admin->save();
        return redirect('admin/createadmin')->with("done", "add successs");
    }
    public function edit($id)
    {
        $admin= Admin::find($id);
        $roles = Role::all();
        return view('welcome',compact('admin','roles'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'role_id'=>'required'
        ]);
        $admin= Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt('$request->password') ;
        $admin->role_id = $request->role_id;
        $admin->save();
        return redirect()->route('listadmin')->with("done", "update successs");
    }
    public function destore($id)
    {
        $admin= Admin::find($id);
        $admin->delete();
        return redirect()->route('listadmin')->with("done", "delete successs");

    }

}
