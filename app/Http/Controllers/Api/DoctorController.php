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
            $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })->orderBy("id", "desc")->get();

        //json
        return response([
            'data' => $doctors,
            'message' => 'Success',
            'status' => 'OK'
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
