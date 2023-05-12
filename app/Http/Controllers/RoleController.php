<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function listrole()
    {
        $role = Role::all();
        return view('list',compact('role'));
    }
    public function create()
    {
        $role = Role::all();
        return view('welcome',compact('role'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'descrption' => 'required|string',

        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->descrption = $request->descrption;
        $role->save();
        return redirect()->route('createrole')->with("done", "add successs");
    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('welcome',compact('role'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'descrption' => 'required|string',
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->descrption = $request->descrption;
        $role->save();
        return redirect()->route('listrole')->with("done", "update successs");
    }
    public function destore($id)
    {
        $desrole = Role::find($id);
        $desrole -> delete();
        return redirect()->route('listrole')->with("done", "delete successs");
    }

}
