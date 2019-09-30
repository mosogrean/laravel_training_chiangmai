<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'author' => $faker->name,
        'price' => $faker->numberBetween(100, 1000),
        'describe' => $faker->text,
        'pic' => $faker->url,
        'type' => $faker->randomElement([
           'สารคดี', 'บันเทิง', 'develop', 'นิตยสาร',
        ]),
    ];
});
