<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Appointment;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // =====THIS WILL BE STORE IT TO USERS TABLE AFTER RUNNING (php artisan db:seed)=====
        // $users = [
        //     [
        //         'name' => 'Patient1',
        //         'email' => "patient@gmail.com",
        //         'password' => bcrypt('123456789'),
        //         'role' => 'patient',
        //         'ic'=>'123456-33-4444',
        //         'gender'=>'Male',
        //         'expertise'=>'',
        //         'profilePic'=>'https://img.favpng.com/25/7/23/computer-icons-user-profile-avatar-image-png-favpng-LFqDyLRhe3PBXM0sx2LufsGFU.jpg',
        //         'phone'=>'011-11111111',
        //     ], [
        //         'name' => 'Doctor1',
        //         'email' => "doctor@gmail.com",
        //         'password' => bcrypt('123456789'),
        //         'role' => 'doctor',
        //         'ic'=>'123456-33-4444',
        //         'gender'=>'Female',
        //         'expertise'=>'Expertise in everything',
        //         'profilePic'=>'https://img.favpng.com/25/7/23/computer-icons-user-profile-avatar-image-png-favpng-LFqDyLRhe3PBXM0sx2LufsGFU.jpg',
        //         'phone'=>'011-11111112',
        //     ], [
        //         'name' => 'Admin1',
        //         'email' => "admin@gmail.com",
        //         'password' => bcrypt('123456789'),
        //         'role' => 'admin',
        //         'ic'=>'123456-33-4444',
        //         'gender'=>'Male',
        //         'expertise'=>'',
        //         'profilePic'=>'https://img.favpng.com/25/7/23/computer-icons-user-profile-avatar-image-png-favpng-LFqDyLRhe3PBXM0sx2LufsGFU.jpg',
        //         'phone'=>'011-11111113',
        //     ],
        //     [
        //         'name' => 'Patient2',
        //         'email' => "patient2@gmail.com",
        //         'password' => bcrypt('123456789'),
        //         'role' => 'patient',
        //         'ic'=>'123456-33-4444',
        //         'gender'=>'Female',
        //         'expertise'=>'',
        //         'profilePic'=>'https://img.favpng.com/25/7/23/computer-icons-user-profile-avatar-image-png-favpng-LFqDyLRhe3PBXM0sx2LufsGFU.jpg',
        //         'phone'=>'012-0034567891'
        //     ],
        // ];

        //======STORE IT TO DATABASE=====
        // foreach($users as $user)
        // {
        //     User::create($user);
        // }
        
    }
}
