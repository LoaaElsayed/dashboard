<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\subject;
use App\Models\duration;
use App\Models\schadule;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\staffResourse;
use App\Http\Resources\durationResource;
use App\Http\Resources\schaduleResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Ramsey\Uuid\Converter\NumberConverterInterface;

class SchaduleController extends Controller
{
    public function store(Request $request)
    {
        $checktoken = $request->header('token');
        $staff = staff::select('id')->where('access_token', '=', $checktoken)->get();
        $x = json_decode($staff, true);
        $y = $x[0]['id'];
        $id = intval($y);
        $depid = DB::table('departments')->where('name', $request->department_name)->value('id');
        $name_staff = Staff::find($id);
        $duration_name = duration::find($request->duration_id);
        $subject_name = subject::find($request->subject_id);
        $day_name = $request->day_name;
        $academy_year = $request->academy_year;
        // generate qr and store it
        $nameqr = 'uploads/qr/' . uniqid() . 'svg';
        $size = 300;
        $logoPath = '/public/uploads/logo/logo.png';
        $qrCode = QrCode::size($size)->color(31, 122, 140)
            ->eye('circle')
            ->merge($logoPath, .5)
            ->errorCorrection('H')
            ->generate("$duration_name->name,$name_staff->name,$subject_name->name,$day_name,$academy_year", 'public/' . $nameqr);
        // validation
        $validation = validator::make($request->all(), [
            'semester' => 'required|in:semester1,semester2',
            'department_name' => 'required',
            'academy_year' => 'required|in:1,2,3,4',
            'section' => 'nullable',
            'duration_id' => 'required',
            'day_name' => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday',
            'subject_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors(),
            ], 404);
        }
        if ($staff) {
            $schaduel = new schadule;
            $schaduel->staff_id = $id;
            $schaduel->semester = $request->semester;
            $schaduel->department_id = $depid;
            $schaduel->academy_year = $request->academy_year;
            $schaduel->section = $request->section;
            $schaduel->qrcode = 'http://attendance.first-meeting.net/public/' . $nameqr;
            $schaduel->duration_id = $request->duration_id;
            $schaduel->day_name = $day_name;
            $schaduel->subject_id = $request->subject_id;
            $schaduel->save();
        }
        return response()->json([
            'success' => 'true',
            'message' => 'add sucessful',
        ], 201);
    }

    public function showschadual(Request $request)
    {
        $checktoken = $request->header('token');
        $data = DB::table('staff')
            ->join('schadules', 'schadules.staff_id', '=', 'staff.id')
            ->join('durations', 'durations.id', '=', 'schadules.duration_id')
            ->join('subjects', 'subjects.id', '=', 'schadules.subject_id')
            ->select('schadules.day_name', 'durations.time_start', 'durations.time_end', 'subjects.name', 'schadules.section', 'schadules.academy_year', 'schadules.qrcode')
            ->where('access_token', $checktoken)
            ->get();
        return response()->json([
            'state' => 'ok',
            'data' => $data,
        ], 200);
    }
}
