<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduit extends Model
{
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
