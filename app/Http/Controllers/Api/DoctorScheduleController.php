<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index(Request $request){
        //schedules
        $schedules = DoctorSchedule::with('doctor')->when($request->input('name'), function($query, $doctor_name){
            return $query->whereHas('doctor', function($query) use($doctor_name){
                $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            });
        })->orderBy("id", "DESC")->get();

        // $schedules = DoctorSchedule::with('doctor')->when($request->input('name'), function($query, $doctor_name){
        //     return $query->whereHas('doctor', function($query) use($doctor_name){
        //         $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        //     });
        // })->when($request->input('day'), function(){
        //     return $query->where('day', 'like', '%' . $day . '%');
        //})->get();

        return response()->json([
            'status' => 'success',
            'data' => $schedules,
            'message' => 'Ok'
        ], 200);
    }

    //store
    public function store(Request $request){

    }

    //update
    public function update(Request $request){

    }

    //delete
    public function destroy(Request $request){

    }
}
