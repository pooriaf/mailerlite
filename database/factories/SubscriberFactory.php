<?php

use App\Models\Subscriber;
use Faker\Generator as Faker;

/**
 * Subscriber factory creates dummy subscribers data
 *
 */
$factory->define(Subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->email,
        'name' => $faker->name,
    ];
});

/**
 * We expect new subscribers always have active state so I defined states for the factory
 *
 */
$factory->state(Subscriber::class, 'new_subscriber', [
    'state' => Subscriber::STATE['ACTIVE']
]);
$factory->state(Subscriber::class, 'random_subscriber', function ($faker) {
    return [
        'state' => $faker->randomElement(Subscriber::STATE)
    ];
});