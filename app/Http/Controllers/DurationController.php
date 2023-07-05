<?php

namespace App\Http\Controllers;

use App\Models\duration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DurationController extends Controller
{
    public function listduration()
    {
        $duration = duration::all();
        return view('duration', compact('duration'));
    }
    public function create()
    {
        return view('duration-Handell');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);
        $duration = new duration();
        $duration->name = $request->name;
        $duration->time_start = $request->time_start;
        $duration->time_end = $request->time_end;
        $duration->save();
        return redirect()->back()->with("done", "add successs");
    }
    public function edit($id)
    {
        $duration = duration::find($id);
        return view('duration-edit',compact('duration'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);
        $duration = duration::find($id);
        $duration->name = $request->name;
        $duration->time_start = $request->time_start;
        $duration->time_end = $request->time_end;
        $duration->save();
        return redirect()->back()->with("done", "update successs");
    }
    public function destore($id)
    {
        DB::table('durations')->where('id', $id)->delete();
        return redirect()->back()->with("done", "delete successs");
    }
}
