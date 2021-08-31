<?php

namespace App\Src\Tests;

use Faker\Factory as Faker;


class MyOwnTest
{
    public $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }
}
