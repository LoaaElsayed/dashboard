<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Departmeant;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function liststaff()
    {
        $staff = Staff::with('department')->get();
        return view('staff',compact('staff')) ;
    }
    public function create()
    {
        $dep= Departmeant::all();
        return view('staff-Handell',compact('dep'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'national_id' => 'required|digits:14',
            'image' => 'required|image|mimes:png,jpg',
        ]);
        $staff= new Staff();
        $staff->name = $request->name;
        $staff->role_staff = $request->role_staff;
        $staff->company_code = "#Fci21";
        $staff->national_id = $request->national_id;
        $staff->department_id = $request-> department_id;
        $path = Storage::disk('uploads')->put('staff', $request->image);
        $staff->image = "uploads/$path";
        $staff->save();
        return redirect("staff/creatstaff")->with("done", "add successs");
    }
    public function edit($id)
    {
        $editstaff=Staff::find($id);
        $depstaff=Departmeant::all();
        return view('welcome',compact('editstaff','depstaff'));
    }
    public function update(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'national_id' => 'required|digits:14|unique:staff,national_id',
            'img' => 'image|mimes:png,jpg',
        ]);
        $upstaff=Staff::find($id);
        $upstaff->name = $request->name;
        $upstaff->role_staff = $request->role_staff;
        $upstaff->national_id = $request->national_id;
        $upstaff->department_id = $request-> department_id;
        $imagepath=$upstaff->image;
        if($request->hasFile('image')){
            Storage::delete($imagepath);
            $imagepath = Storage::disk('uploads')->put('staff', $request->image);
        }
        $upstaff->image = $imagepath;
        $upstaff->save();
        return redirect("/staff/editstaff/$id")->with("done", "update successs");
    }
    public function destore($id)
    {
        $desstaff = Staff::find($id);
        $desstaff -> delete();
        return redirect('staff/liststaff')->with("done", "delete successs");
    }
    public function staffabsence()
    {
        return view('tables-absence-staff');
    }
}
