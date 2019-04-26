<?php

use App\Carrera;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Carrera::class, function (Faker $faker) {
    return [
        'nom_especialidad' => $faker->name,
        
    ];
});

