<?php

use Faker\Generator as Faker;

$factory->define(App\Src\Models\Size::class, function (Faker $faker) {
    return [
        'name' => $faker->words($faker->numberBetween(1,3), true),
        'size' => $faker->unique()->numberBetween(12,45),
    ];
});
