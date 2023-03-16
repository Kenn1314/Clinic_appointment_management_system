<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointments = [
            //=====FIRST USER (PATIENT1)======
            [
                'patient_id' => '1',
                'doctor_id' => '2',
                'date' => '2023-10-10',
                'time' => '12:00am',
                'status' => 'PENDING',
            ],
            [
                'patient_id' => '1',
                'doctor_id' => '2',
                'date' => '2023-04-01',
                'time' => '13:00pm',
                'status' => 'APPROVED',
            ],
            [
                'patient_id' => '1',
                'doctor_id' => '2',
                'date' => '2023-02-02',
                'time' => '15:00pm',
                'status' => 'DONE',
            ],
            [
                'patient_id' => '1',
                'doctor_id' => '2',
                'date' => '2023-05-05',
                'time' => '18:00pm',
                'status' => 'CANCELLED',
            ],

            //======SECOND USER (PATIENT2)=====
            [
                'patient_id' => '4',
                'doctor_id' => '2',
                'date' => '2023-10-10',
                'time' => '12:00am',
                'status' => 'PENDING',
            ],
            [
                'patient_id' => '4',
                'doctor_id' => '2',
                'date' => '2023-04-01',
                'time' => '13:00pm',
                'status' => 'APPROVED',
            ],
            [
                'patient_id' => '4',
                'doctor_id' => '2',
                'date' => '2023-02-02',
                'time' => '15:00pm',
                'status' => 'DONE',
            ],
            [
                'patient_id' => '4',
                'doctor_id' => '2',
                'date' => '2023-05-05',
                'time' => '18:00pm',
                'status' => 'CANCELLED',
            ],
        ];

        //=====CREATE APPOINTMENT AND CREATE IT IN DATABASE=====
        foreach($appointments as $appointment)
        {
            Appointment::create($appointment);
        }
    }
}
