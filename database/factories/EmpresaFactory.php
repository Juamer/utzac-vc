<?php

use App\Empresa;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories prov
ide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'nombre_empresa' => $faker->name,
        'domicilio' => $faker->name,
        'telefono' => $faker->name,
    ];
});