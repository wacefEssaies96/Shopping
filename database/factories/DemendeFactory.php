<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demende;
use App\Produit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Demende::class, function (Faker $faker) {
    return [
        'id_user' =>  User::get('id')->random(),
        'id_prod' =>  Produit::get('id')->random(),
        'status' => $faker->name,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
