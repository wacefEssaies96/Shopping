<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduit extends Model
{
    protected $guarded = [];
    
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
