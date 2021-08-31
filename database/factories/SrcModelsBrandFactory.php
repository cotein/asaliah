<?php

use Faker\Generator as Faker;

$factory->define(App\Src\Models\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->words($faker->numberBetween(1,3), true),
        'description' => '$faker->realText($faker->numberBetween(50,100))',
    ];
});
