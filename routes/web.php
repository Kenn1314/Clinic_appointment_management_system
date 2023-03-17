<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
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
Auth::routes(); // GENERATE ALL THE AUTHENTICATION ROUTE LIKE REGISTER AND LOGIN

Route::get('/', function () {
    return redirect(route('login'));
}); // NAVIGATE TO LOGIN PAGE FIRST

// Route::get('/', function () {
//     return redirect(route('login'));
// }); // NAVIGATE TO LOGIN PAGE FIRST

Route::get('/home', [HomeController::class, 'index'])->name('home');

//manage patient
Route::get('/patient/all',[PatientController::class, 'loadViewPatients']);
Route::get('/patient/viewpatient/{id}',[PatientController::class, 'loadPatientDetails']);
Route::get('/patient/deletepatient/{id}', [PatientController::class, 'deletePatient']);
Route::view('viewPatients','managepatient');

//patient controller or appointment controller?
Route::post('/patient/appointment', [PatientController::class, 'appointment']);
Route::get('/patient/viewDoctors', [PatientController::class, 'viewDoctors']);
Route::post('/patient/make-appointment',[PatientController::class,'submitForm']);