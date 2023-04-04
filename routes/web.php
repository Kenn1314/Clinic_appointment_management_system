<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();// GENERATE ALL THE AUTHENTICATION ROUTE LIKE REGISTER AND LOGIN

Route::get('/', function () {
    return redirect(route('login'));
});// NAVIGATE TO LOGIN PAGE FIRST

Route::get('/home', [HomeController::class, 'index']);

//============================MIDDLEWARE TO LIMIT EACH EACH USER ROLE'S=====================================
Route::middleware('auth')->group(function () {
    
//==========PATIENT ROUTE==========
Route::middleware(['can:isPatient'])->group(function () {
    
    //=====YONG ZHENG HENG========================
    Route::view('aboutUs', 'aboutUs');
    Route::view('faq', 'faq');
    //patient controller or appointment controller?
    Route::post('/patient/appointment', [PatientController::class, 'appointment']);
    Route::get('/patient/viewDoctors', [PatientController::class, 'viewDoctors']);
    Route::post('/patient/make-appointment', [PatientController::class, 'submitForm']);
    //============================================

    Route::get('/profile',[ProfileController::class,'loadViewUser']);
    Route::get('/updateProfile/{id}',[ProfileController::class,'showProfile']);
    Route::post('/updateProfile',[ProfileController::class,'updateProfile']);

    //=====CANCEL OWN APPOINTMENT=====
    Route::get('/cancel/{appointment_id}', [AppointmentController::class, 'cancel_Appointment']);

});

Route::middleware(['can:isAdmin'])->group(function () {
    Route::get('/patient/viewpatient/{id}', [PatientController::class, 'loadPatientDetails']);
    Route::get('/patient/deletepatient/{id}', [PatientController::class, 'deletePatient']);

    //=====UPDATE FROM PENDING TO APPROVED=====
    Route::get('/update_Status/{id}', [AppointmentController::class, 'update_Appointment_Id']);

});

Route::middleware(['can:isDoctor'])->group(function () {
});

Route::middleware(['can:isAdmin|isDoctor'])->group(function () {
    Route::get('/patient/all', [PatientController::class, 'loadViewPatients']);
    Route::get('/patient/viewpatient/{id}', [PatientController::class, 'loadPatientDetails']);
    Route::get("/patient/updatepatient/{id}", [PatientController::class, 'updatePatientDetails']);
    Route::post("/updateUser", [PatientController::class, 'updateRecords']);
});

});


