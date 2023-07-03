<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Departmeant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function liststudent()
    {
        $student = Student::all();
        return view('student',compact('student'));
    }
    public function editstudent($id)
    {
        $editstu=Student::find($id);
        return view('student-edit',compact('editstu'));
    }
    public function updatestudent(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'academy_year' => 'required|in:1,2,3,4',
            'section' =>'required|integer',
            'academy_code' => 'digits:14',
        ]);
        $upstu=Student::find($id);
        $upstu->name = $request->name;
        $upstu->academy_year = $request->academy_year;
        $upstu->section = $request->section;
        $upstu->academy_code = $request->academy_code;
        $upstu->save();
        return redirect()->back()->with("done", "update successs");
    }

    public function destorestudent($id)
    {
        $desstu = Student::find($id);
        $desstu -> delete();
        return redirect('student/liststudent')->with("done", "delete successs");
    }

    public function absencelec()
    {
        $absence = DB::table('studentlec_absence')->get() ;
        return view('studentlec',compact('absence')) ;
    }
    public function deletelec($id)
    {
        DB::table('studentlec_absence')->where('id', $id)->delete() ;
        return redirect()->back()->with("done", "delete successs");
        // DB::table('notifications')->where('id', $id)->delete();
        // return redirect()->back()->with("done", "delete successs");
    }
}
