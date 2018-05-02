<?php

$factory->define(App\Tournament::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "beginn" => $faker->date("d.m.Y", $max = 'now'),
        "end" => $faker->date("d.m.Y", $max = 'now'),
        "public" => 1,
        "tournamentmode_id" => factory('App\Mode')->create(),
        "streamlink" => $faker->name,
        "winner_id" => factory('App\Team')->create(),
    ];
});
