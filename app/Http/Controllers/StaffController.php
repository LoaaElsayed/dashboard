<?php

namespace App\Http\Controllers;

use App\Models\attendStaffall;
use App\Models\Staff;
use App\Models\Departmeant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use NunoMaduro\Collision\Adapters\Phpunit\State;

use function PHPUnit\Framework\isEmpty;

class StaffController extends Controller
{
    public function liststaff()
    {
        $staff = Staff::with('department')->get();
        return view('staff', compact('staff'));
    }
    public function show($id)
    {
        $info = staff::with('department')->find($id);
        $dateexcuse= DB::table('staff')
        ->select('notifications.created_at')
        ->join('notifications','notifications.notifiable_id','=','staff.id')
        ->where('notifications.notifiable_id',$id)
        ->get();
        $absence = DB::table('staff');
        return view('staff-show', compact('info','dateexcuse'));
    }
    public function create()
    {
        $dep = Departmeant::all();
        return view('staff-Handell', compact('dep'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'national_id' => 'required|digits:14',
            'image' => 'required|image|mimes:png,jpg',
        ]);
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->excuse_number = $request->excuse_number;
        $staff->role_staff = $request->role_staff;
        $staff->company_code = "fci21";
        $staff->national_id = $request->national_id;
        $staff->department_id = $request->department_id;
        $path = Storage::disk('uploads')->put('staff', $request->image);
        $staff->image = "http://admin-attendance.first-meeting.net/public/uploads/$path";
        $staff->save();
        return redirect("staff/creatstaff")->with("done", "add successs");
    }
    public function edit($id)
    {
        $editstaff = Staff::find($id);
        $depstaff = Departmeant::all();
        return view('staff-edit', compact('editstaff', 'depstaff'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'national_id' => 'required|digits:14',
            'img' => 'image|mimes:png,jpg',
        ]);
        $upstaff = Staff::find($id);
        $upstaff->name = $request->name;
        $upstaff->excuse_number = $request->excuse_number;
        $upstaff->role_staff = $request->role_staff;
        $upstaff->national_id = $request->national_id;
        $upstaff->department_id = $request->department_id;
        $imagepath = $upstaff->image;
        if ($request->hasFile('image')) {
            if (!empty($imagepath)) {
                Storage::delete($imagepath);
            $imagepath = Storage::disk('uploads')->put('staff', $request->image);
            $upstaff->image = "http://admin-attendance.first-meeting.net/public/uploads/$imagepath";
            }else{
                $upstaff->image = $imagepath;
            }
        }
        $upstaff->save();
        return redirect()->back()->with("done", "update successs");
    }
    public function destore($id)
    {
        $staff = staff::find($id) ;
        $staff->delete();
        return redirect()->back()->with("done", "delete successs");
    }
    public function staffabsence()
    {
        $attend = attendStaffall::all() ;
        return view('tables-absence-staff',compact('attend'));
    }
    public function staffabsencedelete($id)
    {
        DB::table('attend_staff')->where('id', $id)->delete();
        return redirect('staff/absesnce')->with("done", "delete successs");
    }
}
