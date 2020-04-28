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
   public function scopeAttentecommandes($query){
      return $query->where('confirm', '=', 0)->orderBy('created_at', 'desc');
   }
   public function scopeAccepteecommandes($query){
      return $query->where('confirm', '=', 1)->orderBy('created_at', 'desc');
   }
}
