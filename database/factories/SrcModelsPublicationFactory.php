<?php

use Faker\Generator as Faker;




    $factory->define(App\Src\Models\Publication::class, function (Faker $faker) {
        return [
            'meli_id' => $faker->name
        ];
    });



