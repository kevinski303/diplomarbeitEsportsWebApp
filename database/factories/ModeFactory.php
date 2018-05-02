<?php

$factory->define(App\Mode::class, function (Faker\Generator $faker) {
    return [
        "tournamentmode" => $faker->name,
    ];
});
