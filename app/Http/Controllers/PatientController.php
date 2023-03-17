<?php

namespace App\Http\Controllers;

use App\Models\patient_record;
use App\Models\User;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function loadViewPatients(){
        $data = User::whereRole('patient')
        ->paginate(3);
        return view('/patient/managepatient',['patients'=>$data]);
    }

    public function loadPatientsDetails($id){
        $name = User::find($id);
        $data = patient_record::find($id);
        return view('/patient/viewpatient',['patient'=>$data, 'name'=>$name]);
    }

    // public function updatePatientDetails($id){
    //     $data = User::find($id);
    //     return view('/patient/updatepatient',['patient'=>$data] );
    // }
}
