<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Doctor;
use App\Clinic;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Doctor Factory
|--------------------------------------------------------------------------
*/

$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Doctor::class, function () use ($faker) {
    return [
        'clinic_id' => Clinic::all()->random()->id,
        'full_name' => $faker->name($gender = 'male'|'female'),
        'phone_number' => $faker->phoneNumber,
        'email' => str_random(5) . $faker->freeEmail,
        'professional_statement' => $faker->sentence($nbWords = 50, $variableNbWords = true),
        'practicing_from' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});