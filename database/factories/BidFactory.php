<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bid;
use Faker\Generator as Faker;

$factory->defineAs(Bid::class, 'bids without last third events', function (Faker $faker) {
    return [
        'event_id' => $faker->numberBetween(1, 8),
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'price' => $faker->numberBetween(150, 1500),
    ];
});
