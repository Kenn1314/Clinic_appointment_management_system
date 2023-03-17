<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function loadViewPatients(){
        $data = User::whereRole('patient')
        ->paginate(3);
        return view('/patient/managepatient',['patients'=>$data]);
    }
}
