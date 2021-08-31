<?php

use Faker\Generator as Faker;

$factory->define(App\Src\Models\Product::class, function (Faker $faker) {
    return [
        'code' => $faker->postcode,
        'title' => 'Item de test - No Ofertar',
        'description' => 'Item de test - No Ofertar',
        'original_price' => $faker->randomFloat(2, 150, 100000),
        'sale_price' => $faker->randomFloat(2, 10, 50),
        'critical_stock' => $faker->numberBetween(10,20),
        'in_stock' => $faker->numberBetween(50,70),
        'size' => $faker->numberBetween(40,45),
        //'category_id' => \App\Src\Models\Category::all()->random()->id,
        'meta_keywords' => $faker->words($faker->numberBetween(3,10), true),
        'iva_id' => 6,
        'money_id' => 1,
        'packages' => $faker->numberBetween(1,3),
        'brand_id' => \App\Src\Models\Brand::all()->random()->id,

    ];
});
