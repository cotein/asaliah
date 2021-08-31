<?php

use Faker\Generator as Faker;

$factory->define(App\Src\Models\Category::class, function (Faker $faker) {
    return [
        'code' => $faker->postcode,
        'name' => $faker->streetSuffix,
        'short_description' => '$faker->realText($faker->numberBetween(20,40))',
    ];
});
