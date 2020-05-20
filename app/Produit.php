<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
   protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function imageProduits(){
        return $this->hasMany('App\ImageProduit');
    }
    public function ratings(){
      return $this->hasMany('App\Rating');
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
    public function scopeProdConfirme($query){
       return $query->where('confirm', '=', 0)->orderBy('created_at', 'desc');
    }
    public function scopeProdNonConfirme($query){
       return $query->where('confirm', '=', 1)->orderBy('created_at', 'desc');
    }
}
