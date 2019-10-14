<?php

use App\Tag;
use App\Article;
use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::all()->each(function($article) {

            $take = random_int(1, 4);

            $tags_ids = Tag::inRandomOrder()->take($take)->get()->pluck('id');

            $article->tags()->sync($tags_ids);
        });
    }
}
