<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Article;
use App\Category;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence, '.'),
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => rand(1, 2),
        'category_id' => Category::inRandomOrder()->first()->id,
        'created_at'=> $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
        'publish_at'=> Carbon::parse($created_at)->addMonths(random_int(1,6)),
        'status' => rand(0, 1),
    ];
});

