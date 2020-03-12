<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blogeintrag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Blogeintrag::class, function (Faker $faker) {
    return [
        'titel' => $faker->domainWord,
        'inhalt' => $faker->text,
        'user_id' => User::all()->random()->id
    ];
});
