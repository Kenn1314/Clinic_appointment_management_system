<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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
    }

    public function showProfilePicture($id)
    {
        $data = User::find($id);
        return view("/updateProfilePicture",['data'=>$data]);
    }

    public function updateProfile(Request $req)
    {
        $req -> validate([
            'name' => 'required',
            'email' => 'required | email',
            'expertise' => 'required',
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
            $data -> expertise = $req -> expertise;
            $data -> password = $hashedPassword;
            $data -> save();
            return redirect('/profile');

        }else{
            //flash
            //redirect update profile

            $req->session()->flash('PassFailedUpdate','Password update failed');
            return redirect('/updateProfile/'.$req -> id);
        }
    }

    public function updateProfilePicture(Request $req)
    {
        
        // //save img to public/userImages


        $x = 'UserImages/'.\Illuminate\Support\Str::random().'.'.$req->profilePic->getClientOriginalExtension();
        $y = public_path($x);

        while(File::exists($y)){
            $y = public_path('UserImages/'.\Illuminate\Support\Str::random().'.'.$req->profilePic->getClientOriginalExtension());
        }


        if(!File::exists(public_path('UserImages'))){
            File::makeDirectory(public_path('UserImages'), 0755, true);
            File::move($req->profilePic, $y);
        }
        else{
            File::move($req->profilePic, $y);
        }


        $data = $req->input();

        $data = User::find($req ->  id);
        $data -> profilePic = $y;
        $data -> save();

        return redirect('/profile');

        // File::move($req->profilePic, public_path('test1//doctors.jpg'));
    
        // if(!File::exists(public_path('test1'))){
        //     File::makeDirectory(public_path('test1'), 0755, true);
        //     // File::move(public_path('doctors.jpg'), public_path('test1/doctors.jpg'));
        // }
        // else{
        //     File::move($req->profilePic, public_path('test1//doctors.jpg'.));
        //     return "hi";
        // }
        
        // File::makeDirectory(public_path('UserImages'), 0755, true);
            // File::move(public_path('doctors.jpg'), public_path('UserImages'));
        // $path = $req->path();
        // return $path;


    }
}
