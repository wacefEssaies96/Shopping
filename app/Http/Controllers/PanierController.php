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
            ->select('paniers.id','produits.price','produits.photo','paniers.quantity_prod','produits.name','produits.description')
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
        $id = (int)$request->prod_id;
        $qtt = (int)$request->qtt;
        $produit = Produit::find($id);
       if($qtt > 0 && $qtt <= $produit->quantity){
            $panier = new Panier();
            $panier->user_id = Auth::id();
            $panier->prod_id = $id;
            $panier->quantity_prod = $qtt;
            $panier->save();
            return redirect()->route('panier.index')->with('addPanier','Le produit a été ajouté au panier avec succées');
        }else{
            return redirect()->route('panier.index')->with('errorPanier','Quantité Invalid !');
        }
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
        $produit = Produit::find($panier->prod_id);
        return view('panier.edit',[
            'produit' => $produit,
            'panier' => $panier
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
        $produit = Produit::find($panier->prod_id);
        if($request->quantity_prod < 0 || $request->quantity_prod > $produit->quantity ){
            return redirect()->route('panier.index')->with('editPanier','Invalid !');
        }else{
            $panier->quantity_prod = $request->quantity_prod;
            $panier->update();
            return redirect()->route('panier.index')->with('editPanier','Le produit a été modifié avec succées');
        }
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
