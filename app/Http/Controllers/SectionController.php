<?php

namespace App\Http\Controllers;

use App\Http\Resources\sectionResource;
use App\Models\duration;
use App\Models\staff;
use App\Models\schadule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function showgrad1(Request $request)
    {
        $checktoken = $request->header('token');
        $staff = DB::table('staff')
        ->where('access_token', $checktoken)
        ->select('staff.id')
        ->first();
        if ($staff) {
            $level1 =schadule::where([
                    ['staff_id', $staff->id],
                    ['academy_year',1]
                ])
                ->get();
                return [
                    'success' => 'true',
                    'data' => sectionResource::collection($level1),
                ];
        }else {
                return response()->json([
                    'success' => 'false',
                    'msg' => ' 404 not auth'
                ], 401);
        }
    }
    public function showgrad2(Request $request)
    {
        $checktoken = $request->header('token');
        $staff = DB::table('staff')
        ->where('access_token', $checktoken)
        ->select('staff.id')
        ->first();
        if ($staff) {
            $level2 =schadule::where([
                    ['staff_id', $staff->id],
                    ['academy_year',2]
                ])
                ->get();
                return [
                    'success' => 'true',
                    'data' => sectionResource::collection($level2),
                ];        }else {
                return response()->json([
                    'msg' => ' 404 not auth'
                ], 401);
        }
    }
    public function showgrad3(Request $request)
    {
        $checktoken = $request->header('token');
        $staff = DB::table('staff')
        ->where('access_token', $checktoken)
        ->select('staff.id')
        ->first();
        if ($staff) {
            $level3 =schadule::where([
                    ['staff_id', $staff->id],
                    ['academy_year',3]
                ])
                ->get();
                return [
                    'success' => 'true',
                    'data' => sectionResource::collection($level3),
                ];        }else {
                return response()->json([
                    'success' => 'false',
                    'msg' => ' 404 not auth'
                ], 401);
        }
    }
    public function showgrad4(Request $request)
    {
        $checktoken = $request->header('token');
        $staff = DB::table('staff')
        ->where('access_token', $checktoken)
        ->select('staff.id')
        ->first();
        if ($staff) {
            $level4 =schadule::where([
                    ['staff_id', $staff->id],
                    ['academy_year',4]
                ])
                ->get();
                return [
                    'success' => 'true',
                    'data' => sectionResource::collection($level4),
                ];        }else {
                return response()->json([
                    'success' => 'false',
                    'msg' => ' 404 not auth'
                ], 401);
        }
    }
}
