<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;

class ExcuseController extends Controller
{
    public function listexcuse()
    {
        $excuse = Excuse::all();
        return view('list',compact('excuse'));
    }
    public function create()
    {
        $excuse= Excuse::all();
        return view('welcome',compact('excuse'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required|in:Holiday,Vaction,other',
            'descrption' => 'required',
            'duration_time' => 'required',
        ]);
        $excuse= new Excuse();
        $excuse->name = $request->name;
        $excuse->type = $request->type;
        $excuse->descrption = $request->descrption;
        $excuse->duration_time = $request->duration_time;
        $excuse->save();
        return redirect()->route('createexcuse')->with("done", "add successs");
    }
    public function edit($id)
    {
        $excuse = Excuse::find($id);
        return view('welcome',compact('excuse'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required|in:Holiday,Vaction,other',
            'descrption' => 'required',
            'duration_time' => 'required',
        ]);
        $excuse = Excuse::find($id);
        $excuse->name = $request->name;
        $excuse->type = $request->type;
        $excuse->descrption = $request->descrption;
        $excuse->duration_time = $request->duration_time;
        $excuse->save();
        return redirect()->route('listexcuse')->with("done", "update successs");
    }
    public function destore($id)
    {
        $excuse = Excuse::find($id);
        $excuse->delete();
        return redirect()->route('listexcuse')->with("done", "delete successs");
    }
}
