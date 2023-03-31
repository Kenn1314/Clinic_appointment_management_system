<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    public function loadViewUser()
    {
        $user = Auth::user();
        return view('profile',['user'=>$user]);
    }

    public function showProfile($id)
    {
        $data = User::find($id);
        return view("/updateProfile",['data'=>$data]);
    }                   //blade

    public function updateProfile(Request $req)
    {
        $req -> validate([
            'name' => 'required',
            'email' => 'required | email',
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required | same:newPassword'
        ]);


        //compare hash old password with user input old password
        $hashedPassword = $req->oldPasswordHash;
        $plainTextPassword = $req->oldPassword;

        if(Hash::check($plainTextPassword, $hashedPassword))
        {
            $password = $req->newPassword;
            $hashedPassword = Hash::make($password);

            $data = $req->input();

            $data = User::find($req -> id);
            $data -> name = $req -> name;
            $data -> email = $req -> email;
            $data -> password = $hashedPassword;
            $data -> save();
            return redirect('/profile')->with('error', 'old password not match, failed to renew password');
            
        }else{
            //flash
            //redirect update profile

            $req->session()->flash('status','Password update failed');
        }

        

    }
}
