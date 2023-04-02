<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id; // logged in user_id

        //=====SET USER ID TO SESSION=====
        $request->session()->put('user_id', $user_id);
        
        //=====SET USER NAME TO SESSION=====
        $request->session()->put('user_name', Auth::user()->name);

        //=====GET APPOINTMENT OF THE LOGIN USER, THAT HAVE APPOINTMENT THAT ARE APPROVED=====
        $upcoming_appointment = User::find($user_id)->getAppointments()->where('status', 'APPROVED')->get();

        //=====GET APPOINTMENT OF THE LOGIN USER, THAT HAVE APPOINTMENT THAT ARE PENDING=====
        $pending_appointment = User::find($user_id)->getAppointments()->where('status', 'PENDING')->get();

        //=====GET APPOINTMENT OF THE LOGIN USER, THAT HAVE APPOINTMENT THAT ARE COMPLETED=====
        $completed_appointment = User::find($user_id)->getAppointments()->where('status', 'DONE')->get();

        return view('home', ['upcoming' => $upcoming_appointment, 'pending' => $pending_appointment, 'completed' => $completed_appointment]);
    }
}
