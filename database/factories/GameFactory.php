<?php

$factory->define(App\Game::class, function (Faker\Generator $faker) {
    return [
        "beginn" => $faker->date("d.m.Y H:i:s", $max = 'now'),
        "tournament_id" => factory('App\Tournament')->create(),
        "team1_id" => factory('App\Team')->create(),
        "team2_id" => factory('App\Team')->create(),
        "pointsteam1" => $faker->randomNumber(2),
        "pointsteam2" => $faker->randomNumber(2),
    ];
});
