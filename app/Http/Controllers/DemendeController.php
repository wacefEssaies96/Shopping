<?php

namespace App\Http\Controllers;

use App\Produit;
use App\demende;
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
        
        if(Auth::user()->role == 'admin'){
            $attenteDemandes= demende::attenteDemandes()->get();
            $accepteeDemandes= demende::accepteeDemandes()->get();
        }
        else{
            $attenteDemandes = Auth::user()->commandes()->attenteDemandes()->get();
            $accepteeDemandes= Auth::user()->commandes()->accepteeDemandes()->get();
        }
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
    public function store(Request $request,$id)
    {
        // dd($id);  
        $demende = new demende;
        
        $demende->id_user = Auth::id();
        $demende->id_prod = 1; //problem $request->prod;
        $demende->status = "New";
        $demende->save();

        return redirect()->route('Produit.index')->with('AddDemande', 'Demande Envoyer successfully');
    
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
