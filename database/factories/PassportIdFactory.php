<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PassportId;
use Faker\Generator as Faker;

$factory->define(PassportId::class, function (Faker $faker) {
    return [
        'passport_id' => rand(10000000000, 999999999999),
        'user_id' => rand(1, 10)
    ];
});
