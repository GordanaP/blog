<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::whereName('admin')->first();
        $author = Role::whereName('author')->first();

        User::first()->roles()->attach($admin);

        User::findMany([2,3])->map(function($user) use ($author) {
            $user->roles()->attach($author);
        });
    }
}
