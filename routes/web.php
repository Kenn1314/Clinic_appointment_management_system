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
Route::get('/patient/record',[PatientController::class, 'loadViewPatients']);
Route::view('viewPatients','managepatient');