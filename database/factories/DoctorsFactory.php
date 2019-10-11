<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Doctor;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Doctor Factory
|--------------------------------------------------------------------------
*/

$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Doctor::class, function () use ($faker) {
    return [
        'full_name' => $faker->name($gender = 'male'|'female'),
        'email' => str_random(5) . $faker->freeEmail,
        'professional_statement' => $faker->sentence($nbWords = 50, $variableNbWords = true),
        'practicing_from' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        
        'address' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber,
    ];
});