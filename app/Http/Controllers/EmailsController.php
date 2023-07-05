<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\massage;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\excuseResourse;

class EmailsController extends Controller
{

    public function shownumbernotificstudent(Request $request)
    {
        $checktoken = $request->header('token');
        $student = DB::table('students')
            ->join('studentlec_absence', 'studentlec_absence.academy_code', '=', 'students.academy_code')
            ->select('studentlec_absence.id')
            ->where('access_token', '=', $checktoken)
            ->where('absence', '>=', 4)
            ->first();
        if ($student) {
            $notifiableIds = DB::table('notifications')->pluck('notifiable_id')->toArray();
                if (in_array($student->id , $notifiableIds)) {
                    $message = DB::table('notifications')->select('data')->where('notifiable_id','=',$student->id )->get();
                    return response()->json([
                        'from'=>'كليه الحاسبات والمعلومات ',
                        'message' =>$message             
                    ]);
                };
        }
        return [
            'state' => 'sucess',
            'message' =>[],
        ];
    }

    public function showdetailsnotificstudent(Request $request)
    {
        $checktoken = $request->header('token');
        $student = DB::table('students')
            ->join('studentlec_absence', 'studentlec_absence.academy_code', '=', 'students.academy_code')
            ->select('students.name', 'students.section', 'studentlec_absence.subject_name', 'studentlec_absence.id')
            ->where('access_token', '=', $checktoken)
            ->where('absence', '=', 4)
            ->first();
        $details = DB::table('notifications')->select('data')->where('notifiable_id', '=', $student->id)->where('read_at', '=', null)->get();
        return response()->json([
            'state' => 'sucess',
            'details_student ' => $student,
            'message' => $details
        ]);
    }
}
