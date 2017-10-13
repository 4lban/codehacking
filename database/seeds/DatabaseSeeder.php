<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);

        /*
         * if 0 we dont get errors when relationships exists
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        /* truncate means empty table */
//        DB::table('users')->truncate();
//        DB::table('posts')->truncate();

        /*
        Add 10 fake users with relationships posts
        */
        factory(App\User::class, 10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Photo::class, 1)->create();
        /*
         * Add 10 posts
         */
//        factory(App\Post::class, 10)->create();
    }
}
