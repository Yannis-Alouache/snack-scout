<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(100, 1000),
        'description' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'category' => $faker->word,
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(5, 30)
    ];
});
