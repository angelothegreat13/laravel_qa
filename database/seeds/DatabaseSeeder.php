<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10000)->create()->each(function($user){ 
            $user->questions()
                 ->saveMany(
                     factory(App\Question::class,rand(1,5))->make()
                 );
        });
    }
}
