<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demende extends Model
{
    protected $guarded = [];
    
    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function produit(){
        return $this->hasOne('App\Produit');
    }
    public function scopeattenteDemandes($query){
       return $query->where('status', '!=' , 'Accepted')->orderBy('created_at', 'desc');
    }
    public function scopeaccepteeDemandes($query){
       return $query->where('status', '=', 'Accepted')->orderBy('created_at', 'desc');
    } 
    public function scopeDemandesnotifications($query){
       return $query->where('status', '=', 'New')->orderBy('created_at', 'desc');
    }
}

