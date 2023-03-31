<?php

namespace App\Http\Controllers;

use App\Models\patient_record;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function loadViewPatients(){
        // Gate::authorize('isDoctor');
        // Gate::authorize('isAdmin');
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
        $patient = patient_record::find($req->patient_id);
        $data->symptoms=$req->symptoms;
        $data->diagnosis=$req->diagnosis;
        $data->prescription=$req->prescription;
        $data->test_result=$req->test_result;
        $data->save();
        return redirect("/patient/viewpatient/".$patient['id']);
    }
    else 
        return("error no data"); 
    }

    public function updatePatientDetails($id){
        $data = patient_record::find($id);
        $patient = User::where('id', $data['patient_id'])->first();
        return view('patient.editpatient',['data'=>$data, 'patient'=>$patient] );
    }

    function appointment(Request $request){

        return view('/patient/appointment', [
            'doctors' => User::where('role', 'doctor')
                             ->where('id', $request->input('chosen_doctor_id'))
                             ->first(),
            'appointments' => Appointment::where('doctor_id', $request->input('chosen_doctor_id'))
                                          ->where('status', 'PENDING')
                                          ->orWhere('status', 'APPROVED')
                                          ->get(),
        ]);
    }

    function viewDoctors(){
        return view('/patient/viewDoctors',['doctors'=>User::where('role', 'doctor')->get()]);
    }

    public function submitForm(Request $request)
    {

        $appointment=new Appointment;
        $user = Auth::user();
        $appointment->doctor_id=$request->input('doctor_id');
        $appointment->date= $request->input('appointment_date');
        $appointment->time= $request->input('time');
        $appointment->user_id= $user['id']; //use session later
        $appointment->status= 'PENDING';
        $appointment->save();

        return redirect('/home');
    }
}
