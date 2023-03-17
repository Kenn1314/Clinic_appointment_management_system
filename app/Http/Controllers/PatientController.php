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
        return view('patient.managepatient',['patients'=>$data]);
    }

    public function loadPatientDetails($id){
        $name = User::find($id);
        // $data = patient_record::find($id);
        // $data = User::find($id)->getRecords()->get();
        $data = patient_record::where('patient_id', $id)->get();
        return view('patient.viewpatient',['patient'=>$data, 'name'=>$name]);
    }

    public function deletePatient($id){
        $data = User::find($id);
        $data->delete();
        return view('/patient/all');

    }

    function updateRecords(Request $req){
        if ($req != null){
        $data= patient_record::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->save();
        return redirect("datatest");
    }
    else 
        return("error no data"); 
    }

    // public function updatePatientDetails($id){
    //     $data = User::find($id);
    //     return view('/patient/updatepatient',['patient'=>$data] );
    // }
}
