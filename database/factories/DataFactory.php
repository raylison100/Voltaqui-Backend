<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->unique()->safeEmail,
        'partner'   => random_int(0,1),
        'note'      => random_int(0,1),
        'password'  => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    ];
});
