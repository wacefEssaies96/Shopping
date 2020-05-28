<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImageProduit;
use App\Produit;
use Faker\Generator as Faker;

$factory->define(ImageProduit::class, function (Faker $faker) {
    return [
        'prod_id' =>  Produit::get('id')->random(),
        'image' => 'uploads/'.$faker->biasedNumberBetween(1,10).'.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
