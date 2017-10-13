<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween($min = 1, $max = 3),
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement([12,13,14,15,16,17]),
        'category_id' => $faker->randomElement([1,2,3,4,5,10,11]),
        'photo_id' => $faker->randomElement([29,30,31,32,35,36]),
        'title' => $faker->sentence(7, 11),
        'body' => $faker->paragraph(rand(10,15), true),
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file' => 'placeholder.jpg'
    ];
});

