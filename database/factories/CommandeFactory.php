<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commande;
use App\Produit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        'prod_id' =>  Produit::get('id')->random(),
        'user_id' => User::get('id')->random(),
        'confirm' =>$faker->biasedNumberBetween(0,1),
        'quantity_prod' =>$faker->biasedNumberBetween(0,100), 
        'livraison' =>$faker->biasedNumberBetween(0,1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
