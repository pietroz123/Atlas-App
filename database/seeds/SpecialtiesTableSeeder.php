<?php

use Illuminate\Database\Seeder;
use JsonMachine\JsonMachine;
use App\Specialty;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate
        Specialty::truncate();

        /**
         * Get all specialties
         */
        $specialties = JsonMachine::fromFile(base_path() . '/database/seeds/resources/specialties.json');

        /**
         * Loop through each specialty 
         */
        foreach ($specialties as $specialty) {

            // Save specialty
            Specialty::create($specialty);

        }



    }
}
