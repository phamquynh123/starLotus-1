<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' =>  '2',
        'name' => $faker->name,
        'slug' => $faker->slug,
        'quantity' =>  '10',
        'status' => '1',
    ];
});
