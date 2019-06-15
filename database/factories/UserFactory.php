<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    for($i=0;$i<10;$i++)
    {
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

});

$factory->define(\App\Payment::class, function ($faker){
    return [
        'user_id' => rand(2,4),
        'resnumber' => rand(1000000,5000000),
        'price' => rand(1000,50000),
        'payment' => rand(0,1),
        'created_at' => $faker->dateTimeBetween('-6 months' , 'now'),
    ];
});
