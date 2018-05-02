<?php

$factory->define(App\Playoff::class, function (Faker\Generator $faker) {
    return [
        "playofftournament_id" => factory('App\Tournament')->create(),
        "seasontournament_id" => factory('App\Tournament')->create(),
    ];
});
