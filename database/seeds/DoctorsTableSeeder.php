<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Specialty;
use App\DoctorAvailability;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate
        Doctor::truncate();

        // Generate random doctors
        factory(App\Doctor::class, 5000)->create();

        // Retrieve all specialties
        $specialties = Specialty::all();

        /**
         * Complete doctors
         */
        Doctor::all()->each(function($doctor) use ($specialties) {

            // Attach specialties to each doctor
            $doctor->specialties()->attach(
                $specialties->random(rand(1, 1))->pluck('id')->toArray()
            );

            // Create doctor availabilities
            DoctorAvailability::create([
                'doctor_id' => $doctor->id,
                'period' => 'morning',
                'start_time' => rand(8, 10) . ':00:00',
                'end_time' => 12 . ':00:00',
            ]);
            DoctorAvailability::create([
                'doctor_id' => $doctor->id,
                'period' => 'afternoon',
                'start_time' => rand(13, 16) . ':00:00',
                'end_time' => 18 . ':00:00',
            ]);

        });
    }
}
