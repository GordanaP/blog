<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagNames = ['sport', 'art', 'travelling', 'entertaing', 'food'];

        foreach ($tagNames as $tagName) {
            factory('App\Tag')->create([
                'name' => $tagName
            ]);
        }
    }
}
