<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // index
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('pages.patients.index', compact('patients'));
    }
}
