<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence, '.'),
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => rand(1, 2),
        'created_at'=> $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
    ];
});
