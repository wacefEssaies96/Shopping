<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rating;
use App\Produit;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $exist = Rating::
        where([
            ['ratings.prod_id','=',(int)$request->prodId],
            ['ratings.user_id','=',Auth::id()]
        ])
        ->get();
        $produit = Produit::find((int)$request->prodId);
        if($exist->all() == null ){
            if((int)$request->rating != 0){
                /* update average product */
                $somme = $produit->average_rating * $produit->nb_rating;
                $somme += (int)$request->rating;
                $produit->average_rating = $somme / ($produit->nb_rating + 1);
                $produit->nb_rating += 1;
                $produit->update();
                /* end */ 
                $rating = new Rating();
                $rating->user_id = Auth::id();
                $rating->prod_id = (int)$request->prodId;
                $rating->rating = (int)$request->rating;
                $rating->save();
            }
        }
        else{
            if((int)$request->rating != 0){
                /* update average product */
                $somme = $produit->average_rating * $produit->nb_rating;
                $somme -= $exist[0]->rating;
                $somme += (int)$request->rating;
                $produit->average_rating = $somme/$produit->nb_rating;
                $produit->update();
                /* end */
                $request->setMethod('patch');
                $exist[0]->rating = (int)$request->rating;
                $exist[0]->update();
            }
            else{
                $somme = $produit->average_rating * $produit->nb_rating;
                $somme -= $exist[0]->rating;
                $produit->nb_rating -= 1;
                $produit->average_rating = $somme/$produit->nb_rating;
                $produit->update();
                $request->setMethod('delete');
                $exist[0]->delete();
            }     
        }
        return redirect()->route('Produit.show',[(int)$request->prodId]);
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
}
