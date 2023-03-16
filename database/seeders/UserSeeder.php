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
            ], [
                'name' => 'Doctor1',
                'email' => "doctor@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'doctor',
            ], [
                'name' => 'Admin1',
                'email' => "admin@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'admin',
            ],
            [
                'name' => 'Patient2',
                'email' => "patient2@gmail.com",
                'password' => bcrypt('123456789'),
                'role' => 'patient',
            ],
        ];

        //======STORE IT TO DATABASE=====
        foreach($users as $user)
        {
            User::create($user);
        }
        
    }
}
