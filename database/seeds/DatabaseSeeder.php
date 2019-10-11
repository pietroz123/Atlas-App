<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(SpecialtiesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(StatesAndCitiesTablesSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
