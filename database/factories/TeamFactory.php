<?php

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "shortname" => $faker->name,
        "twitterlink" => $faker->name,
        "streamlink" => $faker->name,
        "www" => $faker->name,
    ];
});
