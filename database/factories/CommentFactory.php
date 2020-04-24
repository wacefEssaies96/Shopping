<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Produit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'prod_id' =>  Produit::get('id')->random(),
        'user_id' => User::get('id')->random(),
        'comment' =>$faker->sentence,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
