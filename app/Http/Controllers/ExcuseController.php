<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcuseController extends Controller
{
    public function listexcuse()
    {
        $excuse = Excuse::all();
        return view('excuse',compact('excuse'));
    }
    public function create()
    {
        return view('excuse-Handell');
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
        return view('excuse-edit',compact('excuse'));
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
        return redirect()->back()->with("done", "update successs");
    }
    public function destore($id)
    {
        $excuse = Excuse::find($id);
        $excuse->delete();
        return redirect()->back()->with("done", "delete successs");
    }


    public function listnotifcation()
    {
        $notification = DB::table('notifications')->get();
        return view('listnotification',compact('notification'));
    }

    public function notidestory($id)
    {
        DB::table('notifications')->where('id', $id)->delete();
        return redirect()->back()->with("done", "delete successs");
    }
}
