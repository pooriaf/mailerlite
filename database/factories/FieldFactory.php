<?php

use App\Models\Field;
use Faker\Generator as Faker;

/**
 * Subscriber factory creates dummy fields data
 *
 */
$factory->define(Field::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'type' => $faker->randomElement(Field::TYPE)
    ];
});
