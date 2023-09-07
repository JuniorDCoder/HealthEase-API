<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HospitalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;

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
Route::post('/register', [RegisterController::class, 'create']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/create-hospital', [HospitalController::class, 'store']);
Route::get('/get-hospitals', [HospitalController::class, 'index']);
Route::get('/get-appointments/{id}', [AppointmentController::class, 'index']);
Route::post('/create-appointment', [AppointmentController::class, 'store']);
Route::post('/delete-appointment/{id}', [AppointmentController::class, 'softDeleteAppointment']);

// Route::middleware('auth:sanctum')->get('/user', function () {
//     Route::post('/register', [RegisterController::class, 'create']);
// });
// Route::group(['middleware' => ['auth:sanctum']], function() {
//     Route::post('/register', [RegisterController::class, 'create']);
// });
