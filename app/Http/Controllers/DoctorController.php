<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    //=====VIEW LIST OF DOCTOR FOR ADMIN PAGE=====
    function viewDoctor()
    {
        $doctors = User::where('role', 'doctor')->get();
        
    }
}
