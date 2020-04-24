<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Panier;
use App\User;
use App\Produit;
use Faker\Generator as Faker;

$factory->define(Panier::class, function (Faker $faker) {
    return [
        'user_id' => User::get('id')->random(),
        'prod_id' => Produit::get('id')->random(),
        'quantity_prod' =>$faker->biasedNumberBetween(0,100),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
