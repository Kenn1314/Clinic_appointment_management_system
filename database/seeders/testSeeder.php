<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Appointment;
use App\Models\patient_record;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        Appointment::factory()->count(30)->create();
        patient_record::factory()->count(30)->create();
        User::create([
            'name' => 'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'ic' => '000000-00-0000',
            'gender' =>'male',
            'expertise' =>'admin',
            'profilePic' =>'https://xsgames.co/randomusers/assets/avatars/female/55.jpg',    
            'phone' => '000-0000000',
            'remember_token' => Str::random(10),
        ]);
    }
}
