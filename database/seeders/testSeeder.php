<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Appointment;
use App\Models\patient_record;
use Illuminate\Database\Seeder;

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
        Appointment::factory()->count(10)->create();
        patient_record::factory()->count(10)->create();
    }
}
