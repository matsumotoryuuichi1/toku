<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Office;

use Faker\Generator as Faker;

$factory->define(Office::class, function (Faker $faker) {
    $section=['営業部','経理部','製造部'];
    $gender=['男性','女性'];
    return [
          'your_name'=>$faker->name,
          'gender'=>$faker->randomElement($gender),
          'section'=>$faker->randomElement($section)
    ];
});
