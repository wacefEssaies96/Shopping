<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'user_id' =>  User::get('id')->random(),
        'name' => $faker->sentence(2),
        'price' => $faker->randomFloat(null,1,2000),
        'quantity' => $faker->biasedNumberBetween(0,100),
        'photo' =>  'uploads/'.$faker->biasedNumberBetween(1,10).'.jpg',
        'description' =>$faker->sentence,
        'categorie' => $faker->sentence,
        'DemandeEnvoyer' => 0,
        
        'confirm' => 1,
        'DtEvoyerDm' => null,
        'created_at' => now(),
        'updated_at' => now(),
        
    ];
});
