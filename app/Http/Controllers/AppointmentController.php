<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\user;
use Auth;

class AppointmentController extends Controller
{
    
    public function cancel_Appointment($appointment_id)
    {
        $delete_Data = appointment::find($appointment_id);
        $delete_Data->delete();
        return redirect('home');
    }

    public function edit_Appointment()
    {
        
    }

    public function update_Appointment_Id()
    {
        
    }
}
