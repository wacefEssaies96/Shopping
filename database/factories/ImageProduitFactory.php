<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImageProduit;
use App\Produit;
use Faker\Generator as Faker;

$factory->define(ImageProduit::class, function (Faker $faker) {
    return [
        'prod_id' =>  Produit::get('id')->random(),
        'image' => 'http://lorempixel.com/640/480/food/'.$faker->randomDigitNotNull,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
