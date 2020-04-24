<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'user_id' =>  User::get('id')->random(),
        'name' => $faker->name,
        'price' => $faker->randomFloat(null,1,2000),
        'quantity' => $faker->biasedNumberBetween(0,100),
        'photo' => 'image_projet/1.jpg'.$faker->randomDigitNotNull,
        'description' =>$faker->sentence,
        'categorie' => $faker->sentence,
        'confirm' => $faker->biasedNumberBetween(0,1),
        'created_at' => now(),
        'updated_at' => now(),
        
    ];
});
