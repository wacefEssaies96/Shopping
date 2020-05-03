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
            return view('admin.Demande.Demandeindex',[
                'attenteDemandes'=>$attenteDemandes,
                'accepteeDemandes'=>$accepteeDemandes,
            ]);
        }
        else{
            
            $produits = Auth::user()->produits()->get();
            return redirect()->route('Produit.index')->with('produits', $produits);
            //return view('Produit/indexprod', ['produits' => $produits]);

            /*$attenteDemandes = Auth::user()->demendes()->attenteDemandes()->get();
            $accepteeDemandes= Auth::user()->demendes()->accepteeDemandes()->get();

            $demendes = Auth::user()->demendes()->get();
            return view('client.Demande.Demandeindex',
            //['demendes' => $demendes]
            [
                'attenteDemandes'=>$attenteDemandes,
                'accepteeDemandes'=>$accepteeDemandes,
            ]
        );*/

        }
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
        $demende = new demende;
        
        $demende->id_user = Auth::id();
        $demende->id_prod = $request->prod;
        $demende->status = "New";
        $demende->save();

        $PD = Produit::findOrFail($request->prod);
        $PD->DemandeEnvoyer = 1;
        $PD->DtEvoyerDm = $demende->created_at;
        
        $PD->save();
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
    public function destroy($id)
    {
        
        $PD = Produit::findOrFail($id);

        demende::where('id_prod', $id)->where('created_at',$PD->DtEvoyerDm)->delete();

        $PD->DemandeEnvoyer = 0;
        $PD->DtEvoyerDm = null;
        $PD->save();

        return redirect()->route('Produit.index')->with('deleteDemande', 'Demande deleted successfully');
    }
    public function AccepterDemande($id,$prodid,$userid) 
    {
        $demende=demende::findOrFail($id);
        $demende->status = 'Accepter';
        $demende->save();
        $Produit=Produit::findOrFail($prodid);
        $Produit->confirm = 1;
        $Produit->save();
        return redirect()->route('Demandes.index')->with('AccepterDemande', 'Demande Accepter successfully');
    }
    public function AnnulerDemande($id,$prodid,$userid) 
    {
        $demende=demende::findOrFail($id);
        $demende->status = 'Annuler';
        $demende->save();
        $Produit=Produit::findOrFail($prodid);
        $Produit->confirm = 0;
        $Produit->DemandeEnvoyer = 1;
        $Produit->save();
        return redirect()->route('Demandes.index')->with('AnnulerDemande', 'Demande Annuler successfully');
    }
}
