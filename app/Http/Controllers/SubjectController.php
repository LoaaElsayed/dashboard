<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Subject;
use App\Models\Departmeant;
use App\Models\schadule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function listsubject()
    {
        $subject = Subject::with('staff', 'department')->get();
        return view('subject', compact('subject'));
    }
    public function create()
    {
        $departments = Departmeant::all();
        $staffs = Staff::all();
        return view('subject-Handell', compact('departments', 'staffs'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'academy_year' => 'required|in:1,2,3,4',
            'semester' => 'required|in:semester1,semester2',
            'staff_id' => 'required',
            'department_id' => 'required',
        ]);
        $subject= new Subject();
        $subject->name = $request->name;
        $subject->academy_year = $request->academy_year;
        $subject->semester = $request->semester;
        $subject->staff_id = $request->staff_id;
        $subject->department_id = $request->department_id;
        $subject->save();
        return redirect('/subject/creatsubject')->with('done','successful add');
    }
    public function edit($id)
    {
        $subject = Subject::find($id);
        $departments = Departmeant::all();
        $staffs = Staff::all();
        return view('subject-edit', compact('subject','departments', 'staffs'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'academy_year' => 'required|in:1,2,3,4',
            'semester' => 'required|in:semester1,semester2',
            'staff_id' => 'required',
            'department_id' => 'required',
        ]);
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->academy_year = $request->academy_year;
        $subject->semester = $request->semester;
        $subject->staff_id = $request->staff_id;
        $subject->department_id = $request->department_id;
        $subject->save();
        return redirect()->back()->with("done", "update successs");

    }
    public function destore($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back()->with("done", "delete successs");
    }

}
