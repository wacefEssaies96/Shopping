<?php

namespace App\Http\Controllers;
use App\Panier;
use App\Paiement;
use App\ImageProduit;
use App\User;
use App\Produit;
use App\commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Facture;
use App\Http\Resources\Notification;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(Auth::user()->role == 'admin'){
            $attenteCommandes= commande::attenteCommandes()->get();
            $accepteeCommandes= commande::accepteeCommandes()->get();
        } 
        else{
            $attenteCommandes = Auth::user()->commandes()->attenteCommandes()->get();
            $accepteeCommandes= Auth::user()->commandes()->accepteeCommandes()->get();
        }
        $Notification= new Notification;
        $NCD = $Notification->notification();
        return view('admin.commande.index',[
            'attenteCommandes'=>$attenteCommandes,
            'accepteeCommandes'=>$accepteeCommandes,
            'user'=>$user,
            'NCD'=>$NCD
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_panier = Auth::user()
        ->paniers()
        ->join('produits','paniers.prod_id','=','produits.id')
        ->select('paniers.id','produits.price','produits.photo','paniers.quantity_prod','produits.name','produits.description','produits.quantity')
        ->get();
        $total = 0;
        foreach($list_panier as $item){
            $total += ($item['price']*$item->quantity_prod);
        }
        
        return view('commande.create',[
            'list_commande' => $list_panier,
            'total' => $total
        ]);  
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
            ->select('paniers.id','produits.price','produits.quantity','paniers.quantity_prod','produits.quantity','produits.name','produits.description','paniers.prod_id')
            ->get();
        $total = 0;
        foreach($panier as $item){
            $commande = new Commande();
            $commande->user_id = Auth::id();
            $commande->prod_id = $item->prod_id;
            $commande->quantity_prod = $item->quantity_prod;
            $commande->livraison = 0;
            $commande->confirm = 0;
            $commande->save(); 
            $total += ($item->quantity_prod * $item->price)*1.15;
            $produit = Produit::find($item->prod_id);
            $produit->quantity -= $item->quantity_prod;
            $produit->update();
        }
        Mail::to(Auth::user()->email)->send(new Facture($panier,$total));
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
        return redirect('/admin/commandes')->with('message' , 'Order successfully deleted !')
                                            ->with('alertType', 'success');
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
        return redirect('/admin/commandes')->with('message' , 'Order successfully approved !')
                                           ->with('alertType', 'success');
    }

    
    //Admin
    public function ConsulterDetailleOrder($prodid,$userid) 
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
                return view('admin.commande.ConsulterDetailleOrder',[
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
}
