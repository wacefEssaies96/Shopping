<?php

namespace App\Http\Controllers;

use App\Produit;
use App\ImageProduit;
use App\User;
use App\Rating;
use App\Http\Resources\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

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
        if(Auth::user()->role=="admin"){
            return redirect()->route('OurProdacts');
        }else{
            return view('Produit/indexprod', ['produits' => $produits,'total'=> $total]);
        }
        
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
        

        if(Auth::user()->role=="admin"){
            return redirect()->route('OurProdacts')->with('AddProduit', 'Product successfully add');
        }else{
            return redirect()->route('Produit.index')->with('AddProduit', 'Product successfully add');
        }
        
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $ImageProduit = ImageProduit::where('prod_id', $id)->get();
        $total = 0;
        foreach($ImageProduit as $item){
            $total += 1;
        }
        $Produit=Produit::findOrFail($id);
        $rating = Rating::where([
            ['user_id','=',Auth::id()], 
            ['prod_id','=',$Produit->id]
        ])->get();
        
        if($rating->all() != null){
            $arrRating = Arr::get($rating[0],'rating');
        }
        else{
            $arrRating = 0;
        }
        $Produit->offsetSet('rating', $arrRating); 
        if($Produit->confirm){
            return view('Produit.showprod',['Produit' => $Produit,'ImageProduit' => $ImageProduit, 'user' => Auth::id(),'total'=> $total ]);
        }else{
            return redirect()->route('home');
        }
    }
    public function ConsulterProduit($id) 
    {
        $ImageProduit = ImageProduit::where('prod_id', $id)->get();
        $total = 0;
        foreach($ImageProduit as $item){
            $total += 1;
        }
        
        $user = Auth::user();
        $Prod = Produit::findOrFail($id);
        $produser = User::findOrFail($Prod->user_id);

        if(($user->role == 'admin')or($user->role == 'client'and $Prod->user_id == $user->id )){
            return view('Produit.ConsulterProduit',['Produit' => $Prod,'ImageProduit' => $ImageProduit, 'user' => $user, 'produser' => $produser,'total'=> $total ]);
        }elseif( ($user->role == 'client') and ($Prod->user_id != $user->id ) ){
            return redirect()->route('Produit.index');
        }else{
            return redirect()->route('home');
        }

    }
    //Admin
    public function ConsulterDetailleProduit($prodid,$userid) 
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
                return view('admin.Produit.ConsulterDetailleProduit',[
                    'Produit' => Produit::findOrFail($prodid),
                    'user' =>  User::findOrFail($userid) ,
                    'NCD'=>$NCD,
                    'total'=> $total ,
                    'ImageProduit' => $ImageProduit,
                    'produser' => $produser
                ]);
            }else{
                return redirect()->route('indexadmin');
            }
        }else{
            return redirect()->route('home');
        }

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

        if($request->photo == null){
            $data=$request->validate($this->validationRules());
            $data['photo']= $request->anphoto;
            Produit::where('id', $id)->update($data);
        }else{
            $data=$request->validate($this->validationRulesphoto());
            $data['photo']= $request->photo->store('uploads','public');
            Produit::where('id', $id)->update($data);
        }
        
        
        
        return redirect()->route('ConsulterProduit', $id)->with('updateProduit', 'Product has been successfully updated');
        
        
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

        if(Auth::user()->role=="admin"){
            return redirect()->route('OurProdacts')->with('deleteProduit', 'Product successfully deleted');
        }else{
        
            return redirect()->route('Produit.index')->with('deleteProduit', 'Product successfully deleted');
        }
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
    /// Admin
    public function AllProd()
    {
        $produits = Produit::paginate(6);
        return view('admin/produit/Produitindex', ['produits' => $produits]);
    }
    public function OurProdacts()
    {
        
        $user = Auth::user();

        $Notification= new Notification;
        $NCD = $Notification->notification();

        $produits = Produit::paginate(6);
        $total = 0;
        foreach($produits as $item){
            $total += 1;
        }


        return view('/admin/Produit/OurProdacts', [
            'produits' => $produits,
            'NCD' => $NCD,
            'total' => $total,
            'user' =>$user
        ]);
    }
}
