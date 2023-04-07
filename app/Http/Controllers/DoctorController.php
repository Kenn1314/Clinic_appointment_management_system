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

    function updateDoctor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'ic' => 'required | unique:users| regex: /^\d{6}-\d{2}-\d{4}$/',
            'phone' => 'regex: /^\d{3}-\d{7}$/ | required | unique:users',
            'password' => 'required | string | min:8 | confirmed',
            'expertise' => 'required | max:255',
        ]);

        $update_Doctor = User::find($request->id);
        $update_Doctor->name = $request->email;
        $update_Doctor->ic = $request->ic;
        $update_Doctor->phone = $request->phone;
        $update_Doctor->expertise = $request->expertise;
        $update_Doctor->password = bcrypt($request->password);
        $update_Doctor->save();

        return redirect('/viewDoctor');
    }

}
