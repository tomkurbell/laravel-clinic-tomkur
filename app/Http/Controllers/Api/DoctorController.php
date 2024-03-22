<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // index
    public function index(Request $request)
    {
        $doctors = $request->name;
        $doctors = \App\Models\Doctor::when($request->input('name'), function($query, $doctors){
            $query->where('doctor_name', $doctors);
        })->orderBy("id", "desc")->get();

        //json
        return response()->json($doctors, 200);
    }
}
