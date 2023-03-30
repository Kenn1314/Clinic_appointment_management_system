<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        //=====CHECK IF USER IS A USER OF THIS SYSTEM BY CHECKING ITS USER EMAIL AND PASSWORD=======
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            //=====REDIRECT TO HOME=====
            return redirect()->route('home');

        //===========REMARKS :: BACK UP CODE LEARN FROM YOUTUBE, REMEMBER TO BE DELETED==================

        //     if (auth()->user()->role == 'patient') 
        //     {
        //         return "patient";
        //     //   return redirect()->route('patient.home');
        //     }
        //     else if (auth()->user()->role == 'doctor') 
        //     {
        //         return "doctor";
        //     //   return redirect()->route('doctor.home');
        //     }
        //     else
        //     {
        //         return "admin";
        //     //   return redirect()->route('admin.home');
        //     }
        //========================================================================
        
        }
        else
        {
            return redirect()->route('login')->with('error','Incorrect email or password, please try again !');
        }
        
    }
}
