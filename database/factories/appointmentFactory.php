<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
class appointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['PENDING', 'APPROVED','DONE','CANCELLED']);
        $time=$this->faker->randomElement(['08:00am', '09:00am', '10:00am', '11:00am', '12:00pm', '13:00pm', '14:00pm',
        '15:00pm','16:00pm','17:00pm']);
            $doctorId = User::query()->whereRole('DOCTOR')->inRandomOrder()->first()->id;
            $patientId = User::query()->whereRole('PATIENT')->inRandomOrder()->first()->id;
        return [
            'user_id' => $patientId,
            'doctor_id' => $doctorId,
            'date' => Carbon::instance($this->faker->dateTimeBetween('-1 year', 'now')),
            'time'=>$time,
            'status'=>$status,
        ];
    }
}
