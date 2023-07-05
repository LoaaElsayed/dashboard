<?php

namespace App\Http\Controllers;

use App\Models\lab;
use App\Models\lec;
use App\Models\staff;
use App\Models\schadule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Resources\insidesheetsResourse;

use function PHPUnit\Framework\isEmpty;

class ListsheetController extends Controller
{
    //show list section's name 
    public function titlesheet(Request $request)
    {
        $checktoken = $request->header('token');
        $detilschad = DB::table('schadules')
            ->join('staff', 'staff.id', '=', 'schadules.staff_id')
            ->join('subjects', 'subjects.id', '=', 'schadules.subject_id')
            ->join('durations', 'durations.id', '=', 'schadules.duration_id')
            ->select('schadules.academy_year', 'schadules.day_name', 'schadules.created_at', 'durations.name as duration_name', 'subjects.name')
            ->where('access_token', '=', $checktoken)
            ->get();
        return response()->json([
            'success' => 'true',
            'details' => $detilschad
        ], 200);
    }
    //show list section's name attend
    // public function shownamesinlab(Request $request)
    // {
    //     $checkyear = $request->input('academy_year');
    //     $checkduration = $request->input('duration_name');
    //     $subject = $request->input('subject');
    //     $listname = lab::where('academy_year', '=', $checkyear)->where('duration_name', '=', $checkduration)
    //         ->where('subject_name', '=', $subject)->get();

    //     return [
    //         'success' => 'true',
    //         'list names' => insidesheetsResourse::collection($listname)
    //     ];
    // }
    //show list  name attend
    public function shownameattend(Request $request)
    {
        $cheaktoken = $request->header('token');
        $checkyear = $request->input('academy_year');
        $checkduration = $request->input('duration_name');
        $subject = $request->input('subject');
        $staffrole = DB::table('staff')->select('role_staff')->where('access_token', $cheaktoken)->first();
        if ($staffrole && $staffrole->role_staff === 'Engineer') {
            $listname = lab::where('academy_year', '=', $checkyear)->where('duration_name', '=', $checkduration)
            ->where('subject_name', '=', $subject)->get();
            // $listname = lab::all() ;
                return [
                    'success' => 'true1',
                    'role' => 'Engineer',
                    // $listname,
                    'list names' => insidesheetsResourse::collection($listname)
                ];
            
        } else {
            $listname = lec::where('academy_year', '=', $checkyear)->where('duration_name', '=', $checkduration)
            ->where('subject_name', '=', $subject)
            ->get();
            // $listname = lec::all() ;
            return [
                'success' => 'true2',
                'role' => 'Doctor',
                // $listname,
                'list names' => insidesheetsResourse::collection($listname)
            ];
        }
    }
}
