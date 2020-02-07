<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Batch;
use Faker\Generator as Faker;

$factory->define(Batch::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'quantity' => random_int(10,100),
        'description' => $faker->text,
        'delivery_direction' => $faker->address,
        'status' => random_int(0,2),
        'pickup_date' => $faker->date,
        'donor_company' => $faker->company,
        'category_id' => random_int(1,11)
    ];
});
 