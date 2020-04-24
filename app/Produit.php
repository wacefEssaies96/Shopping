<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function imageProduits(){
        return $this->hasMany('App\ImageProduit');
    }
    public function commande()
   {
      return $this->belongsTo('App\Commande');
   }
   public function panier()
   {
      return $this->belongsTo('App\Panier');
   }
   public function comments()
   {
      return $this->hasMany('App\Comment');
   }
public function demande(){
    return $this->hasOne('App\Demande');
}
}
