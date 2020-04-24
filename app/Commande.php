<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
   public function user()
   {
      return $this->belongsTo('App\User');
   }
   public function produits()
   {
      return $this->hasMany('App\Produit');
   }
  
}
