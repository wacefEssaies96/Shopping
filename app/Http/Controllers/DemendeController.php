<?php

namespace App\Http\Controllers;

use App\demende;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemendeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produits = Produit::all();
        if(Auth::user()->role == 'admin'){
            $attenteDemandes= Produit::attenteDemandes()->get();
            $accepteeDemandes= Produit::accepteeDemandes()->get();
        }
        /*else{
            $attenteCommandes = Auth::user()->commandes()->attenteCommandes()->get();
            $accepteeCommandes= Auth::user()->commandes()->accepteeCommandes()->get();
        }*/

        return view('admin.Demande.Demandeindex',[
            'attenteDemandes'=>$attenteDemandes,
            'accepteeDemandes'=>$accepteeDemandes,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\demende  $demende
     * @return \Illuminate\Http\Response
     */
    public function show(demende $demende)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\demende  $demende
     * @return \Illuminate\Http\Response
     */
    public function edit(demende $demende)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\demende  $demende
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demende $demende)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\demende  $demende
     * @return \Illuminate\Http\Response
     */
    public function destroy(demende $demende)
    {
        //
    }
}
