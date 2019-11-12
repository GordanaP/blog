<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profile::class)->states('author1')->create();
        factory(App\Profile::class)->states('author2')->create();
    }
}
