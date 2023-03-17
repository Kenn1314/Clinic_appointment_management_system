<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\patient_record;

class PatientRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //======PATIENT RECORDS TO BE INSERTED INTO THE DATABASE (PATIENT_RECORD)=====
        $patient_records = [
            [
                'patient_id' => '1',
                'doctor_id' => '2',
                'appointment_id' => '4',
                'symptoms' => 'Cough, fever, lost of taste',
                'diagnosis' => 'COVID-19',
                'prescription' => 'Opioids. Examples: oxycodone (OxyContin), hydrocodone (Vicodin), and meperidine (Demerol)',
                'test_result' => 'positive for weed',
            ],
            [
                'patient_id' => '4',
                'doctor_id' => '2',
                'appointment_id' => '8',
                'symptoms' => 'lower temperature than normal, raised or lowered blood pressure',
                'diagnosis' => 'hypertension',
                'prescription' => 'Central Nervous System (CNS) Depressants.',
                'test_result' => 'positive for too much meme',
            ],
        ];

        foreach($patient_records as $patient_record)
        {
            patient_record::create($patient_record);
        }
    }
}
