<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Illuminate\Support\Facades\Auth; 

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
    
    public function Home()
    {

        $user = Auth::user();

        if($user->role== 'admin'){
            return redirect()->route('home.index');
        }elseif($user->role == 'client'){
            return redirect()->route('shop');
        }else{
            return redirect()->route('indexadmin');
        }
        
    }
    
}
