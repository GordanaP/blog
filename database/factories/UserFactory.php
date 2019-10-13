<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $name = strtolower($faker->firstName),
        'email' => $name.'@test.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// Create a user with determined attribute values
$factory->state(User::class, 'gordana', [
    'name' => 'gordana',
    'email' => 'g@gmail.com',
]);

$factory->state(User::class, 'darko', [
    'name' => 'darko',
    'email' => 'd@gmail.com',
]);

