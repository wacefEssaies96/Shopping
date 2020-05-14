<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Produit;

class SearchController extends Controller{
    
    public function index(){
        $produits = Produit::all();
        return view('shop',[
            'produits' => $produits
        ]);
    }
}