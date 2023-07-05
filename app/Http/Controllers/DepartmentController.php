<?php

namespace App\Http\Controllers;

use App\Http\Resources\departmentResourse;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function list(){
        $dep=department::all();
        return departmentResourse::collection($dep);
    }
}
