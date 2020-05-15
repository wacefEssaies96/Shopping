<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use App\Paiement;
use App\Commande;
use App\Panier;
use App\Produit;


class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Stripe::setApiKey('sk_test_W4rmc6j0k6XCOg8cvVjD7g6a00yW882oW2');

        $intent = PaymentIntent::create([
        'amount' => $this->calculTotal(),
        'currency' => 'usd',
        // Verify your integration in this guide by including this parameter
        'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);
        $clientSecret = Arr::get($intent,'client_secret');
        $user = Auth::user();
        $nameClient = $user->name;
        $total = $this->calculTotal();
        return view('paiement.create',[
            'clientSecret' => $clientSecret,
            'nameClient' => $nameClient,
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
        $paiement = new Paiement();
        $paiement->type_cb =$request->type_cb;
        $paiement->num =$request->num;
        $paiement->date =$request->date;
        $panier =Auth::user()
            ->paniers()
            ->join('produits','paniers.prod_id','=','produits.id')
            ->select('paniers.id','produits.price','produits.photo','paniers.quantity_prod','produits.name','produits.description','paniers.prod_id')
            ->get();
        $total = $this->calculTotal();
        return view('commande.create',[
            'paiement' => $paiement,
            'list_commande' => $panier,
            'total' => $total
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function calculTotal(){
        $list_panier = Auth::user()
            ->paniers()
            ->join('produits','paniers.prod_id','=','produits.id')
            ->select('paniers.id','produits.price','paniers.quantity_prod')
            ->get();
        $total = 0;
        foreach($list_panier as $item){
            $total += ($item['price']*$item->quantity_prod);
        }
        return $total;
    }
}
