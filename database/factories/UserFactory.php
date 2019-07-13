<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $email = $faker->unique()->safeEmail;
    $name = explode('@', $email);
    $name1 = str_replace(array('.', '@'), '_', $name[0]);
    return [
        'name' => $name1,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => bcrypt('secret01'), // secret01
        'remember_token' => Str::random(10),
    ];
});
