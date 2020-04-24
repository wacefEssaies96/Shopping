<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produit=Produit::all();
        return view('home',[
            'produit'=>$produit,
        ]);
    }
    
    public function index2()
    {
        $produit=Produit::all();
        return view('home',[
            'produit'=>$produit,
        ]);
    }
}
