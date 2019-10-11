<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Specialty;

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
        DB::table('doctor_specialty')->truncate();
        Doctor::truncate();

        // Generate random doctors
        factory(App\Doctor::class, 1000)->create();

        // Retrieve all specialties
        $specialties = Specialty::all();

        // Attach specialties to each doctor
        Doctor::all()->each(function($doctor) use ($specialties) {
            $doctor->specialties()->attach(
                $specialties->random(rand(1, 1))->pluck('id')->toArray()
            );
        });
    }
}
