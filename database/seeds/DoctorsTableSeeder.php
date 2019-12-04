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

        /**
         * Create one doctor for app demonstration
         */

        $doctor = Doctor::create([
            'clinic_id' => Clinic::all()->random()->id,
            'full_name' => 'José Eduardo',
            'phone_number' => '(15) 3232-3748',
            'email' => 'joseedu@gmail.com',
            'professional_statement' => 'Meu lema é tudo ser bem feito.',
            'practicing_from' => '2017-08-11',
            'password' => bcrypt('joseedu123'),
            'remember_token' => str_random(10),
        ]);

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
    }
}
