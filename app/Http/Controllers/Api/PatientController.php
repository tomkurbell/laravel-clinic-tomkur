<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // index
    public function index(Request $request)
    {
        $patient = $request->name;
        $patient = \App\Models\Patient::when($request->input('name'), function($query, $patient){
            $query->where('name', 'like', '%' . $patient . '%');
        })->orderBy("id", "desc")->get();

        //json
        return response([
            'data' => $patient,
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
