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
        return view('admin.view_doctor', ['doctors' => $doctors]);
    }

    function deleteDoctor($id)
    {
        $found_doctor = User::find($id);
        $found_doctor->delete();
        return redirect('/viewDoctor');
    }

    //=====NAVIGATE TO UPDATE DOCTOR DETAIL FORM=====
    function showUpdate($id)
    {
        $data = User::find($id);
        return view("admin.update_doctor", ["doctor_info"=>$data]);
    }

    function updateDoctor($id)
    {
        $found_doctor = User::find($id);
    }
}
