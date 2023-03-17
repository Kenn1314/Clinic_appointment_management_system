<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function loadViewPatients(){
        // $data= User::whereRole('PATIENT')->get();
        // $data= User::paginate(3);
        // $data = User::whereHas('roles', function($query){
        //     $query->where('role', 'PATIENT');
        // })->paginate(3);
        $data = User::whereRole('patient')
        ->paginate(3);
        return view('/patient/managepatient',['patients'=>$data]);
    }
}
