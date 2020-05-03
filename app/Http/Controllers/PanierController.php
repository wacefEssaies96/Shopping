<?php

namespace App\Http\Controllers;

use App\Panier;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_panier = Auth::user()
            ->paniers()
            ->join('produits','paniers.prod_id','=','produits.id')
            ->select('paniers.id','produits.price','paniers.quantity_prod','produits.name')
            ->get();
        $total = 0;
        foreach($list_panier as $item){
            $total += ($item['price']*$item->quantity_prod);
        }
        if($total == 0){
            $list_panier = [];
        }
        return view('panier/index',[
            'list_panier' => $list_panier,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $panier = new Panier();
        $panier->user_id = Auth::id();
        $panier->prod_id = (int)$request->prod_id;
        $panier->quantity_prod = 1;
        $panier->save();
        return redirect()->route('panier.index')->with('addPanier','Le produit a été ajouté au panier avec succées');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(panier $panier)
    {
        return view('panier.show',[
            'panier' => $panier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function edit(panier $panier)
    {
        return view('panier.edit',[
            'panier'=>$panier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, panier $panier)
    {
        $panier->quantity_prod=$request->quantity_prod;
        $panier->update();
        return redirect()->route('panier.index')->with('editPanier','Le produit a été modifié avec succées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy(panier $panier)
    {
        $panier->delete();
        return redirect()->route('panier.index')->with('deletePanier','Le produit a été supprimé avec succées');
    }
}
