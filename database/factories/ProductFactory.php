<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat,
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'date' => $faker->dateTime->default(DB::raw('CURRENT_TIMESTAMP'))
    ];
});
