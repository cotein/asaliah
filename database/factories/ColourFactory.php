<?php

use App\Src\Models\Colour;
use Faker\Generator as Faker;

$factory->define(Colour::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->colorName(),
        'rgb' => $faker->colorName(),
    ];
});
