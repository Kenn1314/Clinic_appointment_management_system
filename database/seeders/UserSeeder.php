<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=====THIS WILL BE STORE IT TO USERS TABLE AFTER RUNNING (php artisan db:seed)=====
        $users = [
            [
                'name' => 'Patient1',
                'email' => "patient@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'patient',
                'ic'=>'123456-33-4444',
                'gender'=>'Male',
                'phone'=>'011-11111111',
            ], [
                'name' => 'Doctor1',
                'email' => "doctor@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'doctor',
                'ic'=>'123456-33-4444',
                'gender'=>'Female',
                'phone'=>'011-11111112',
            ], [
                'name' => 'Admin1',
                'email' => "admin@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'admin',
                'ic'=>'123456-33-4444',
                'gender'=>'Male',
                'phone'=>'011-11111113',
            ],
            [
                'name' => 'Patient2',
                'email' => "patient2@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'patient',
                'ic'=>'123456-33-4444',
                'gender'=>'Female',
            ],
        ];

        //======STORE IT TO DATABASE=====
        foreach($users as $user)
        {
            User::create($user);
        }
        
    }
}
