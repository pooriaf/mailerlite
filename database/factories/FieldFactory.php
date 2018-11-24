<?php

use App\Models\Field;
use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(1),
        'type' => $faker->randomElement(Field::TYPE)
    ];
});