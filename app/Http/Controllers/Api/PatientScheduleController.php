<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientScheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get all patient schedules paginated
        //search patient schedules by patient_id
        $patientSchedules = DB::table('patient_schedules')
            ->when($request->input('patient_id'), function ($query, $name) {
                return $query->where('patient_id', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $patientSchedules,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        //validate incoming request
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'schedule_time' => 'required',
            'complaint' => 'required',
            'status' => 'required',
        ]);

        //store patient schedule
        $patientSchedule = PatientSchedule::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_time' => $request->schedule_time,
            'complaint' => $request->complaint,
            'status' => 'waiting',
            'no_antrian' => 1,

        ]);

        return response([
            'data' => $patientSchedule,
            'message' => 'Patient schedule stored',
            'status' => 'OK'
        ], 200);
    }
}
