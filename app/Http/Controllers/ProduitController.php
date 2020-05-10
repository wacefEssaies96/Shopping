<?php

namespace App\Http\Controllers;

use App\Produit;
use App\User;
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
        $produits = Auth::user()->produits()->paginate(5);
        
        $total = 0;
        foreach($produits as $item){
            $total += 1;
        }
        return view('Produit/indexprod', ['produits' => $produits,'total'=> $total]);
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
        $data=$request->validate($this->validationRulesphoto());

        $data['user_id'] = Auth::id();
        $data['DemandeEnvoyer'] = 0;
        $data['confirm'] = 0;
        $data['photo']= $request->photo->store('uploads','public');
        $Produit=Produit::create($data);
        /*
        debut store detaille
        $Produit = new Produit;

        $request->validate($this->validationRules());
        $Produit->user_id = Auth::id();
        $Produit->name = $request->name;
        $Produit->price = $request->price;
        $Produit->quantity = $request->quantity;
        $Produit->description = $request->description;
        $Produit->categorie = $request->categorie;
        $Produit->DemandeEnvoyer = 0;
        $Produit->confirm = 0;
        $Produit->photo = $request->photo;

            fin store detaille
        */
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

        //$Produit->save();

        return redirect()->route('Produit.index')->with('AddProduit', 'Vous avez ajouter un Produit');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $Produit=Produit::findOrFail($id);
        if($Produit->confirm){
            return view('Produit.showprod',['Produit' => $Produit, 'user' => Auth::id() ]);
        }else{
            return redirect()->route('home');
        }
    }
    public function ConsulterProduit($id) 
    {
        $user = Auth::user();
        $Prod = Produit::findOrFail($id);
        $produser = User::findOrFail($Prod->user_id);

        if(($user->role == 'admin')or($user->role == 'client'and $Prod->user_id == $user->id )){
            return view('Produit.ConsulterProduit',['Produit' => $Prod, 'user' => $user, 'produser' => $produser ]);
        }elseif( ($user->role == 'client') and ($Prod->user_id != $user->id ) ){
            return redirect()->route('Produit.index');
        }else{
            return redirect()->route('home');
        }

    }
    public function ConsulterDetailleProduit($prodid,$userid) 
    {
        return view('admin.Produit.ConsulterDetailleProduit',['Produit' => Produit::findOrFail($prodid), 'user' =>  User::findOrFail($userid) ]);

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
        $data=$request->validate($this->validationRules());
        if($request->photo == null){
            $data['photo']= $request->anphoto;
        }else{
            $data['photo']= $request->photo->store('uploads','public');
        }
        
        Produit::where('id', $id)->update($data);
        /*
        $validatedData = $request->validate($this->validationRules());
        Produit::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'categorie' => $request->categorie,
                'photo' => $request->photo
              ]);
              */
        return redirect()->route('ConsulterProduit', $id)->with('updateProduit', 'Produit updated successfully');

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
    
    private function validationRulesphoto()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|min:1|numeric',
            'quantity' => 'required|min:1|max:20|numeric',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'photo' => 'required|file|image'
        ];
    }
    private function validationRules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|min:1|numeric',
            'quantity' => 'required|min:1|max:20|numeric',
            'description' => 'required|string',
            'categorie' => 'required|string',
        ];
    }
    public function AllProd()
    {
        $produits = Produit::paginate(6);
        return view('admin/produit/Produitindex', ['produits' => $produits]);
    }
}
