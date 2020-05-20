<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'prod_id','user_id','rating'
    ];

    public function produit()
   {
      return $this->belongsTo('App\Produit');
   }
   public function user()
   {
      return $this->belongsTo('App\User');
   }
}
