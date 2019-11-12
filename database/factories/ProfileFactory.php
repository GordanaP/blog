<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'biography' => $faker->paragraph,
    ];
});

// Create a user with determined attribute values
$factory->state(Profile::class, 'author1', [
    'first_name' => 'Darko',
    'last_name' => 'Vlajkovic',
    'user_id' => 2
]);

$factory->state(Profile::class, 'author2', [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'user_id' => 3
]);
