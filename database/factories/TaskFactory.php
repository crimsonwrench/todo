<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'completed' => rand(0, 1),
    ];
});
