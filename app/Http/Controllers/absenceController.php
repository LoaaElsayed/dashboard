<?php

namespace App\Http\Controllers;

use App\Models\lec;
use App\Models\student;
use App\Models\schadule;
use App\Models\absenclab;
use App\Models\absenclec;
use App\Models\lab_absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\sheetsResourse;
use App\Notifications\MessageforStudend;
use App\Http\Resources\insidesheetsResourse;
use App\Models\attendStaff;
use App\Models\staff;
use Illuminate\Support\Facades\Notification;
use Nette\Utils\Random;

class absenceController extends Controller
{
    // absence lec student
    public function nameabsenc(Request $request)
    {
        $cheaktoken = $request->header('token');
        $year = $request->input('year');
        $subject = $request->input('subject');
        $codewithsubject = DB::table('lec_absences')
            ->where('subject_name', $subject)
            ->pluck('academy_code');
        $academyCodes = DB::table('students')
            ->select('academy_code')
            ->whereNotIn('academy_code', $codewithsubject)
            ->where('academy_year', $year)
            ->pluck('academy_code');
        $nameCodes = DB::table('students')
            ->select('name')
            ->whereNotIn('academy_code', $codewithsubject)
            ->where('academy_year', $year)
            ->get();
        $staffrole = DB::table('staff')->select('role_staff')->where('access_token', $cheaktoken)->first();
        if ($staffrole && $staffrole->role_staff === 'Engineer') {
            foreach ($academyCodes as $code) {
                $name = DB::table('students')
                    ->where('academy_code', $code)
                    ->pluck('name')
                    ->first();
                if (!$name) {
                    $name = DB::table('lab_absences')
                        ->where('academy_code', $code)
                        ->pluck('name')
                        ->first();
                }
                $existingAbsence = DB::table('studentlab_absence')->where('academy_code', $code)->where('subject_name', $subject)->first();
                if ($existingAbsence) {
                    DB::table('studentlab_absence')->where('academy_code', $code)->where('subject_name', $subject)->increment('absence');
                } else {
                    DB::table('studentlab_absence')->insert([
                        'id' => random_int(1, 10000),
                        'academy_code' => $code,
                        'name' => $name,
                        'absence' => 1,
                        'subject_name' => $subject
                    ]);
                }
            }
            return response()->json(
                [
                    'name absence in lab' => $nameCodes,
                ]
            );
        } else {
            foreach ($academyCodes as $code) {
                $name = DB::table('students')
                    ->where('academy_code', $code)
                    ->pluck('name')
                    ->first();
                if (!$name) {
                    $name = DB::table('lec_absences')
                        ->where('academy_code', $code)
                        ->pluck('name')
                        ->first();
                }
                $existingAbsence = DB::table('studentlec_absence')->where('academy_code', $code)->where('subject_name', $subject)->first();
                if ($existingAbsence) {
                    $absenceCount = $existingAbsence->absence;
                    if ($absenceCount == 4) {
                        $message = '  السلام عليكم ورحمه الله وبركاته
                        نخبرك عزيزي الطالب/الطالبه بان نسبه غيابك تجاوزت 4 محاضرات لذالك يجب عليك الانتظان في الحضور   والا هيتم منعك من دخول الامتحا
                        نتمني لك التوفيق داتما {فريق عمل ابليكشن حضرني}';
                        $title = 'إنذار غياب';
                        DB::table('studentlec_absence')->where('academy_code', $code)->where('subject_name', $subject)->increment('absence');
                        $student = absenclec::where('absence', '>=', 4)->where('subject_name', $subject)->get();
                        Notification::send($student, new MessageforStudend($message, $title));
                        return response()->json(
                            [
                                // 'message' => $message,
                                'name absence in lec' => $nameCodes,
                            ]
                        );
                    } else {
                        DB::table('studentlec_absence')->where('academy_code', $code)->where('subject_name', $subject)->increment('absence');
                        return response()->json([
                            'name absence in lab' => $nameCodes,
                            
                        ], 200);
                    }
                } else {
                    DB::table('studentlec_absence')->insert([
                        'academy_code' => $code,
                        'name' => $name,
                        'absence' => 1,
                        'subject_name' => $subject
                    ]);
                }
            }
            return response()->json(
                [
                    'name absence in lec' => $nameCodes,
                ]
            );
        }
    }

    // attend staff
    public function attendstaff(Request $request)
    {
        $checktoken = $request->header('token');
        $finger = $request->input('finger');
        $location = $request->input('location');
        if ($finger == 'true') {
            if ($location == 'true') {
                $staff = staff::select('name')->where('access_token', $checktoken)->get();
                $attend = new attendStaff();
                $attend->name = $staff;
                $attend->day = date('Y-m-d');
                $attend->state = 'attend';
                $attend->excuse = 'null';
                return [
                    'state' => 'sucess',
                    'message' => 'attend sucessful'
                ];
            } else {
                return [
                    'location' => 'not valiate'
                ];
            }
        } else {
            return [
                'fingerprint' => 'not valiate'
            ];
        }
    }
}
