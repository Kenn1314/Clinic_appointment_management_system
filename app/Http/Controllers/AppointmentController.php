<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\user;
use Auth;

class AppointmentController extends Controller
{
    
    function getAppointmentForSpecificDoctor(Request $request)
    {

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
    public function cancel_Appointment($appointment_id)
    {
        $delete_Data = appointment::find($appointment_id);
        $delete_Data->delete();
        return redirect('home');
    }

    public function edit_Appointment(Request $request)
    {
        $appointment=Appointment::find($request->id);
        $user = Auth::user();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->input('appointment_date');
        $appointment->time = $request->input('time');
        $appointment->user_id = $user['id']; //use session later
        $appointment->status = 'PENDING';
        $appointment->save();

        return redirect('/home');
    }

    public function update_Appointment_Id(Request $req)
    {
        $update_appointment = Appointment::find($req->id);
        $update_appointment->status = "APPROVED";
        $update_appointment->save();
        
        return redirect('home'); // GO BACK TO HOME PAGE ACCORDING TO USER ROLE

    }

    public function make_appointment(Request $request)
    {
        $appointment=new Appointment;
        $user = Auth::user();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->input('appointment_date');
        $appointment->time = $request->input('time');
        $appointment->user_id = $user['id']; //use session later
        $appointment->status = 'PENDING';
        $appointment->save();

        return redirect('/home');

        // return $request->input('doctor_id');
    }
}
