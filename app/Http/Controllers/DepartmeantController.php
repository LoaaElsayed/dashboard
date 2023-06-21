<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Staff;
use App\Models\Departmeant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmeantController extends Controller
{
    public function listexcuse()
    {
        $department = Departmeant::with('admin')->get();
        return view('department', compact('department'));
    }
    public function create()
    {
        $admins = Admin::all();
        return view('department-Handell', compact('admins'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'admin_id' => 'required',
        ]);
        $departmeant = new Departmeant();
        $departmeant->name = $request->name;
        $departmeant->admin_id = $request->admin_id;
        $departmeant->save();
        return redirect()->route('createdepartment')->with("done", "add successs");
    }
    public function edit($id)
    {
        $departmeant = Departmeant::find($id);
        $admins = Admin::all();
        return view('department-edit', compact('admins', 'departmeant'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'admin_id' => 'required',
        ]);
        $departmeant = Departmeant::find($id);
        $departmeant->name = $request->name;
        $departmeant->admin_id = $request->admin_id;
        $departmeant->save();
        return redirect()->back()->with("done", "update successs");
    }
    public function destore($id)
    {
        // $departmeant = Departmeant::find($id);
        // $staff = Staff::where('department_id', $id);
        // $departmeant->delete();
        // $staff->delete();
        DB::table('staff')->where('department_id', $id)->delete();
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back()->with("done", "delete successs");

    }
}
