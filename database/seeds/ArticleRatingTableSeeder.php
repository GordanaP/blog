<?php

use App\User;
use App\Rating;
use App\Article;
use Illuminate\Database\Seeder;

class ArticleRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::inRandomOrder()->take(10)->get()
            ->map(function($article){
                $article->ratings()->save(
                    Rating::inRandomOrder()->first(),
                    ['user_id' => User::inRandomOrder()->get()->unique()->first()->id]
                );
            });
    }
}
