<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Produit;

class SearchController extends Controller{
    
    public function index(Request $request){
        
        $select = Arr::get($request,'select');
        $categorie = Arr::get($request,'categorie');
 
        if($request->min == null && $request->max == null){
            $price = "$10 - $10000";
            $min = "10";
            $max = "10000";
        }else{
            $price = "$".$request->min." - $".$request->max;
            $min = $request->min;
            $max = $request->max;
        }
        
        if($categorie != null && $select != null ){
            
            $produits = Produit::
            where([
                ['confirm','=',1],
                ['categorie',$categorie],
                ['price','<',(int)$max],
                ['price','>',(int)$min]
            ])->paginate((int)$select);
        }
        if($categorie == null && $select != null){
          
            $produits = Produit::
            where([
                ['confirm','=',1],
                ['price','<',(int)$max],
                ['price','>',(int)$min]
            ])
            ->paginate((int)$select);
        }
        if($categorie != null && $select == null){
         
            $produits = Produit::
            where([
                    ['confirm','=',1],
                    ['categorie','=',$categorie],
                    ['price','<',(int)$max],
                    ['price','>',(int)$min]
            ])->paginate(6);
        }
        if($categorie == null && $select == null){
            
            $produits = Produit::
            where([
                ['confirm','=',1],
                ['price','<',(int)$max],
                ['price','>',(int)$min]
            ])->paginate(6);
        }
     
        return view('shop',[
            'produits' => $produits,
            'categorie' =>$categorie,
            'paginator' => $select,
            'price' => $price,
            'min' => $min,
            'max' => $max 
        ]);
    }
}