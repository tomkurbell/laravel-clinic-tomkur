<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    public function index(Request $request){
        $doctorySchedules = DoctorSchedule::with('doctor')->when($request->input('doctor_id'), function($query, $doctorId){
            return $query->where('doctor_id', $doctorId);
        })->orderBy('id', 'DESC')->paginate(10);

        return view('pages.doctor_schedules.index', compact('doctorySchedules'));

    }

    // create
    public function create(){
        return view('pages.doctor_schedules.create');
    }

    // store
    public function store(Request $request){
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);

        $doctorSchedule = new DoctorSchedule();
        $doctorSchedule->doctor_id = $request->input('doctor_id');
        $doctorSchedule->day = $request->input('day');
        $doctorSchedule->time = $request->input('time');
        $doctorSchedule->note = $request->input('note');
        $doctorSchedule->status = $request->input('status');
        $doctorSchedule->save();
        return redirect()->route('doctor-schedules.index')->with('success', 'Doctor Schedule created successfully.');
    }

    // edit
    public function edit($id){
        $doctorSchedule = DoctorSchedule::find($id);
        return view('pages.doctor_schedules.edit', compact('doctorSchedule'));
    }

    // update
    public function update(Request $request, $id){
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);
        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->doctor_id = $request->input('doctor_id');
        $doctorSchedule->day = $request->input('day');
        $doctorSchedule->time = $request->input('time');
        $doctorSchedule->note = $request->input('note');
        $doctorSchedule->status = $request->input('status');
        $doctorSchedule->save();
        return redirect()->route('doctor-schedules.index')->with('success', 'Doctor Schedule updated successfully.');
    }

    // destroy
    public function destroy($id){
        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->delete();
        return redirect()->route('doctor-schedules.index')->with('success', 'Doctor Schedule deleted successfully.');
    }
}
