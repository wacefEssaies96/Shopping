<?php

namespace App\Http\Controllers;
use App\Panier;
use App\commande;
use App\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $attenteCommandes= commande::attenteCommandes()->get();
            $accepteeCommandes= commande::accepteeCommandes()->get();
        }
        else{
            $attenteCommandes = Auth::user()->commandes()->attenteCommandes()->get();
            $accepteeCommandes= Auth::user()->commandes()->accepteeCommandes()->get();
        }
        return view('admin.commande.index',[
            'attenteCommandes'=>$attenteCommandes,
            'accepteeCommandes'=>$accepteeCommandes,
        ]);
        // $list_commande = Auth::user()
        //     ->commandes()
        //     ->join('produits','commandes.prod_id','=','produits.id')
        //     ->select('commandes.id','produits.price','commandes.quantity_prod','produits.name')
        //     ->get();
        //     $total = 0;
        //     foreach($list_commande as $item){
        //         $total += ($item['price']*$item->quantity_prod);
        //     }
        // // dump($total);
        // // dump($list_commande);
        // return view('commande.index',[
        //     'list_commande'=>$list_commande,
        //     'total' => $total
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $panier = Auth::user()
            ->paniers()
            ->join('produits','paniers.prod_id','=','produits.id')
            ->select('paniers.id','produits.price','paniers.quantity_prod','produits.name','produits.description','paniers.prod_id')
            ->get();
        foreach($panier as $item){
            $commande = new Commande();
            $commande->user_id = Auth::id();
            $commande->prod_id =$item->prod_id;
            $commande->quantity_prod =$item->quantity_prod;
            $commande->livraison = $request->select;
            $commande->confirm = 0;
            $commande->save(); 
        }
        $panier = Auth::user()->paniers()->get();
        
        foreach($panier as $item){
            $item->delete();
        }
        return redirect()->route('panier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $commande = commande::find($id);
        $commande->delete();
        return redirect('/admin/commandes')->with('message' , 'Commande supprimée avec succès !');
    }

    /**
     * Accept new command waiting validation
     *
     * @param  \App\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $commande = commande::find($id);
        $commande->confirm = 1;
        $commande->save();
        return redirect('/admin/commandes')->with('message' , 'Commande approuvée avec succès !');
    }
}
