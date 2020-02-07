<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Petition;
use Faker\Generator as Faker;

$factory->define(Petition::class, function (Faker $faker) {
    return [
        'status' => random_int(0,2),
        'observations' => $faker->realText(50),
        'email' => $faker->email(),
        'name' => $faker->name(),
        'phone' => $faker->e164PhoneNumber(),
    ];
});
