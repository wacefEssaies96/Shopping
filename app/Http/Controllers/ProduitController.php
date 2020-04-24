<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Auth::user()->produits()->get();
        return view('Produit/indexprod', ['produits' => $produits]);
        //return view('Produit/Produitindex', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produit/createprod');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $Produit = new Produit;

        $Produit->user_id = Auth::id();
        $Produit->name = $request->name;
        $Produit->price = $request->price;
        $Produit->quantity = $request->quantity;
        $Produit->description = $request->description;
        $Produit->categorie = $request->categorie;
        $Produit->confirm = 0;
        $Produit->photo = $request->photo;

        /*if($request->hasFile('photo')){
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/image_projet',$filename);
            $Produit->photo = $filename;
        } else {
            return $request;
            $Produit->photo = '';
        }*/

        $Produit->save();

        return redirect()->route('Produit.index')->with('AddProduit', 'New Produit added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        return view('Produit.showprod',['Produit' => Produit::findOrFail($id)]);

        //Produit $produit
        //return view('Produit.showprod')->with('Produit', $produit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Produit.editprod',['Produit' => Produit::findOrFail($id)]);
        
        //Produit $produit
        //return view('produit.editprod', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        Produit::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'categorie' => $request->categorie,
                'photo' => $request->photo
              ]);
        return redirect()->route('Produit.show', $id)->with('updateProduit', 'Produit updated successfully');

        //$validatedData = $request->validate($this->validationRules());
        //$Produit->update($validatedData);
        //return redirect()->route('Produit.show', $Produit->id)->with('updateProduit', 'Produit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Produit $produit
        
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('Produit.index')->with('deleteProduit', 'Produit deleted successfully');
    }

    private function validationRules()
    {
        return [
            'name' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1|max:20',
            'description' => 'required',
            'categorie' => 'required'
        ];
    }
    public function AllProd()
    {
        $produits = Produit::all();
        return view('Produit/Produitindex', ['produits' => $produits]);
    }
}
