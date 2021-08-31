<?php

use Faker\Generator as Faker;

$factory->define(App\Src\Models\TypeUser::class, function (Faker $faker) {
    return [
        'name' => 'Administrador',
        'level' => 1000
    ];
});
