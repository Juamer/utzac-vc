<?php

use App\Solicitud;
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

$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        'fecha' => $faker->name,
        'tipo_sol' => $faker->name,
        'materia' => $faker->name,
        'fecha_de_v' => $faker->name,
        'objetivo_G' => $faker->name,
        'objetivo_E' => $faker->name,
        'status' => $faker->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

