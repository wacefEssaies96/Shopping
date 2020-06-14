<?php

namespace App\Http\Controllers;

use App\Produit;
use App\ImageProduit;
use App\User;
use App\demende;
use App\Http\Resources\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemendeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /// all demendes
    public function index()
    {
        
        if(Auth::user()->role == 'admin'){
            $user = Auth::user();
            $Notification= new Notification;
            $NCD = $Notification->notification();
            return view('admin.Demande.Demandeindex',[
                'NCD'=>$NCD,
                'user'=>$user
            ]);
        }
        else{  
            $produits = Auth::user()->produits()->get();
            return redirect()->route('Produit.index')->with('produits', $produits);
        }
    }
    ///  demendes accepte
    public function indexTDAC()
    {
        
        if(Auth::user()->role == 'admin'){
            $accepteeDemandes= demende::accepteeDemandes()->paginate(5);
            $user = Auth::user();
            $Notification= new Notification;
            $NCD = $Notification->notification();
            return view('admin.Demande.DemandeindexTDAC',[
                'accepteeDemandes'=>$accepteeDemandes,
                'NCD'=>$NCD,
                'user'=>$user
            ]);
        }
        else{
            $produits = Auth::user()->produits()->get();
            return redirect()->route('Produit.index')->with('produits', $produits);
        }
    }
    ///  demendes en attente
    public function indexTDEA()
    {
        
        if(Auth::user()->role == 'admin'){
            $attenteDemandes= demende::attenteDemandes()->paginate(5);
            $user = Auth::user();
            $Notification= new Notification;
            $NCD = $Notification->notification();
            return view('admin.Demande.DemandeindexTDEA',[
                'attenteDemandes'=>$attenteDemandes,
                'NCD'=>$NCD,
                'user'=>$user
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
    /// client add demande
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
        return redirect()->route('Produit.index')->with('AddDemande', 'Demand Send successfully');
    
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

    public function ConsulterDetailleDemandes($prodid,$userid) 
    {
        $ImageProduit = ImageProduit::where('prod_id', $prodid)->get();
        $total = 0;
        foreach($ImageProduit as $item){
            $total += 1;
        }

        $user = Auth::user();
        $Produit = Produit::findOrFail($prodid);
        $produser = User::findOrFail($Produit->user_id);

        $Notification= new Notification;
        $NCD = $Notification->notification();

        if($user->role== 'admin'){
            if($Produit->user_id == $userid){
                return view('admin.Demande.ConsulterDetailleDemandes',[
                    'Produit' => Produit::findOrFail($prodid),
                    'user' =>  User::findOrFail($userid) ,
                    'NCD'=>$NCD,
                    'total'=> $total ,
                    'ImageProduit' => $ImageProduit,
                    'produser' => $produser
                ]);
            }else{
                return redirect()->route('indexnotification');
            }
        }else{
            return redirect()->route('home');
        }

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
    /// admin deleteDemande
    public function destroy($id)
    {
        //
    }
    /// admin deleteDemande
    public function deleteDemande(Request $request)
    {
        $demende = demende::findOrFail((int)$request->id);
        $PD = Produit::findOrFail($demende->id_prod);
        $PD->DemandeEnvoyer = 0;
        $PD->confirm = 0;
        $PD->DtEvoyerDm = null;
        $PD->save();
        $demende->delete();
        
        return redirect()->route('Demandes.index')->with('deleteDemande', 'Demand deleted successfully');
    
    }
    /// admin AnnulerDemande
    public function AnnulerDemande($id,$prodid,$userid) 
    {
        $demende=demende::findOrFail($id);
        $demende->status = 'Canceled';
        $demende->save();
        $Produit=Produit::findOrFail($prodid);
        $Produit->confirm = 0;
        $Produit->DemandeEnvoyer = 1;
        $Produit->save();
        return redirect()->route('Demandes.index')->with('AnnulerDemande', 'Demand canceled successfully');
    }
    /// admin AccepterDemande
    public function AccepterDemande($id,$prodid,$userid) 
    {
        $demende=demende::findOrFail($id);
        $demende->status = 'Accepted';
        $demende->save();
        $Produit=Produit::findOrFail($prodid);
        $Produit->confirm = 1;
        $Produit->save();
        return redirect()->route('Demandes.index')->with('AccepterDemande', 'Demande Accepted successfully');
    }
    //client delete demande
    public function deleted(Request $request)
    {
        
        $PD = Produit::findOrFail((int)$request->id);

        demende::where('id_prod', (int)$request->id)->where('created_at',$PD->DtEvoyerDm)->delete();

        $PD->DemandeEnvoyer = 0;
        $PD->confirm = 0;
        $PD->DtEvoyerDm = null;
        $PD->save();

        return redirect()->route('Produit.index')->with('deleteDemande', 'Demande canceled successfully');
    }

}
