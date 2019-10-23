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
        factory(App\Profile::class)->states('gordana')->create();
        factory(App\Profile::class)->states('darko')->create();
    }
}
