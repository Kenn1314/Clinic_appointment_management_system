<?php

namespace App\Http\Controllers;

use App\Models\patient_record;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PatientController extends Controller
{
    public function loadViewPatients()
    {
        // Gate::authorize('isAdmin');
        if (Gate::allows('isDoctor')) {
            $sessionId = Session::get('user_id');
            $patients = patient_record::where('doctor_id', $sessionId)->get('patient_id');
            foreach($patients as $patient){
                $array[] = User::find($patient['patient_id']);
            }
           
            $collection = collect($array);
            $uniqueCollection = $collection->unique('id');
            $uniqueArray = $uniqueCollection->all();
            return view('patient.managepatient', ['patients' => $uniqueArray]);
        } else {
            $data = User::whereRole('patient')
                ->paginate(3);
            return view('patient.managepatient', ['patients' => $data]);
        }
    }

    public function loadPatientDetails($id)
    {
        $name = User::find($id);
        // $data = patient_record::find($id);
        // $data = User::find($id)->getRecords()->get();
        $data = patient_record::where('patient_id', $id)->get();
        return view('patient.viewpatient', ['patient' => $data, 'name' => $name]);
    }

    public function deletePatient($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/patient/all');
    }

    function updateRecords(Request $req)
    {
        if ($req != null) {
            $data = patient_record::find($req->id);
            $patient = User::find($req->patient_id);
            $data->symptoms = $req->symptoms;
            $data->diagnosis = $req->diagnosis;
            $data->prescription = $req->prescription;
            $data->test_result = $req->test_result;
            $data->save();
            // return $req->patient_id;
            return redirect("/patient/viewpatient/" . $patient['id']);
        } else
            return ("error no data");
    }

    public function updatePatientDetails($id)
    {
        $data = patient_record::find($id);
        $patient = User::where('id', $data['patient_id'])->first();
        return view('patient.editpatient', ['data' => $data, 'patient' => $patient]);
    }

    function viewDoctors()
    {
        return view('/patient/viewDoctors', ['doctors' => User::where('role', 'doctor')->get()]);
    }


}
