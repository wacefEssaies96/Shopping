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
            $attenteDemandes= demende::attenteDemandes()->paginate(5);
            $accepteeDemandes= demende::accepteeDemandes()->paginate(5);
            
            $TDAC = 0;
            $TDEA = 0;
            foreach($accepteeDemandes as $item){
                $TDAC  += 1;
            }
            foreach($attenteDemandes as $item){
                $TDEA  += 1;
            }


            return view('admin.Demande.Demandeindex',[
                'attenteDemandes'=>$attenteDemandes,
                'accepteeDemandes'=>$accepteeDemandes,
                'TDAC'=>$TDAC,
                'TDEA'=>$TDEA 
            ]);
        }
        else{
            
            $produits = Auth::user()->produits()->get();
            return redirect()->route('Produit.index')->with('produits', $produits);

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
        //
    }
    public function deleteDemande(Request $request)
    {
        $demende = demende::findOrFail((int)$request->iddemende)->delete();
        
        return redirect()->route('Demandes.index')->with('deleteDemande', 'Demande deleted successfully');
    }
    public function deleted(Request $request)
    {
        
        
        $PD = Produit::findOrFail((int)$request->id);

        demende::where('id_prod', (int)$request->id)->where('created_at',$PD->DtEvoyerDm)->delete();

        $PD->DemandeEnvoyer = 0;
        $PD->DtEvoyerDm = null;
        $PD->save();

        return redirect()->route('Produit.index')->with('deleteDemande', 'Demande annuler successfully');
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
