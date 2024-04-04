<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceMedicines;
use Illuminate\Http\Request;

class ServiceMedicineController extends Controller
{
    //Medicines

    public function index(Request $request)
    {
        $serviceMedicines = ServiceMedicines::when($request->name, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->name . '%');
        })->orderBy('id', 'desc')
        ->get();
        return response()->json([
            'status' => 'OK',
            'message' => 'success',
            'data' => $serviceMedicines
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
