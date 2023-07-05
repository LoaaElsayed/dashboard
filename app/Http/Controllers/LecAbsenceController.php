<?php

namespace App\Http\Controllers;

use App\Models\lec;
use App\Models\User;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LecAbsenceController extends Controller
{

    public function storeLecAbsence(Request $request)
    {
        $validation = validator::make($request->all(), [
            'name' => 'required|max:255',
            'academy_code' => 'required|digits:14',
            'doctor_name' => 'required|max:255',
            'duration_name' => 'required|max:150',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors(),
            ], 404);
        }
        $access_token=$request->header('token');
        $access_name=$request->name;
        $access_code=$request->academy_code;
        $user=student::where("access_token","=",$access_token)->first();
        if ($user !==null) {
            $checkdata = student::where("name","=",$access_name)->where("academy_code","=",$access_code)->first();
            if($checkdata){
                $store = lec::create([
                    'name' => $request->name,
                    'academy_code' => $request->academy_code,
                    'doctor_name' => $request->doctor_name,
                    'duration_name' => $request->duration_name,
                    'academy_year' => $request->academy_year,
                    'day_name'=>$request->day_name,
                    'subject_name'=>$request->subject_name
                ]);
            } else{
                return response()->json([
                    'success' => 'false',
                    'mes' => 'name or academy_code is not correct'
                ],404);
            }
        }

        return response()->json([
            'success' => 'true',
            'message' => 'add sucessful',
        ], 201);
    }



}
