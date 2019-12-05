<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate
        Clinic::truncate();

        // Generate random doctors
        factory(App\Clinic::class, 100)->create();

    }
}
