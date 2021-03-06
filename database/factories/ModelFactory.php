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

$factory->define(\Someline\Models\Foundation\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'gender' => $faker->randomElement(['M', 'F']),
        'birthday' => $faker->dateTimeBetween('-60 years', '-10 years'),
        'country' => $faker->countryCode,
        'timezone' => $faker->timezone,
        'locale' => $faker->locale,
        'username' => $faker->userName,
        'phone_number' => $faker->phoneNumber,
        'status' => 1,
    ];
});

$factory->define(\Someline\Models\Foundation\Todo::class, function (Faker\Generator $faker) {
    return [
        'title' => str_random(10),
        'is_done' => $faker->randomElement([0, 1])
    ];
});
