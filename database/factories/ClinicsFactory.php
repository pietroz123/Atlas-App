<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Clinic;
use App\City;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Clinics Factory
|--------------------------------------------------------------------------
*/

$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Clinic::class, function () use ($faker) {
    return [
        'address' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber,
        'co_city' => City::all()->random()->co_city,
        'time_slot_per_client_in_min' => rand(15, 30),
    ];
});