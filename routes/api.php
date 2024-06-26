<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\DoctorScheduleController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PatientScheduleController;
use App\Http\Controllers\Api\SatuSehatTokenController;
use App\Http\Controllers\Api\ServiceMedicineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::apiResource('/api-doctors', DoctorController::class)->middleware('auth:sanctum');
Route::apiResource('/api-patients', PatientController::class)->middleware('auth:sanctum');
Route::apiResource('/api-doctor-schedules', DoctorScheduleController::class)->middleware('auth:sanctum');
Route::apiResource('/api-service-medicines', ServiceMedicineController::class)->middleware('auth:sanctum');
Route::apiResource('/api-patient-schedules', PatientScheduleController::class)->middleware('auth:sanctum');
Route::get('/satusehat-token', [SatuSehatTokenController::class, 'token'])->middleware('auth:sanctum');
