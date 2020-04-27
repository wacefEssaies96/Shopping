<?php

namespace App\Http\Controllers;

use App\commande;
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
}
