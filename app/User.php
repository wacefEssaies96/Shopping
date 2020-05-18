<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','adresse','phone','etat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function demendes()
    {
        return $this->hasMany('App\Demende');
    }
    public function paniers()
    {
        return $this->hasMany('App\Panier');
    }
    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
}
