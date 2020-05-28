<?php

namespace App\Http\Controllers;

use App\ImageProduit;
use App\Produit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageProduitController extends Controller
{
    public function ImgProduit($id)
    {
        $user = Auth::user();
        $Produit = Produit::findOrFail($id);
        $produser = User::findOrFail($Produit->user_id);
        $ImageProduit = ImageProduit::where('prod_id', $id)->get();
        $total = 0;
        foreach($ImageProduit as $item){
            $total += 1;
        }

        if($user->role== 'admin'){
            if($produser->role== 'admin'){
                return view('Produit/ImageProduit/indeximg', ['Produit' => $Produit,'ImageProduit' => $ImageProduit, 'user' => $user, 'produser' => $produser,'total'=> $total]);
            }else{
                $produits = Produit::paginate(6);
                return view('admin/produit/Produitindex', ['produits' => $produits]);
            }
        }elseif($user->role == 'client'){
            if($produser== $user){
                return view('Produit/ImageProduit/indeximg', ['Produit' => $Produit,'ImageProduit' => $ImageProduit, 'user' => $user, 'produser' => $produser,'total'=> $total]);
            }else{
                return redirect()->route('Produit.index');
            }
        }else{
            return redirect()->route('home');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prod_id)
    {
        $user = Auth::user();
        $Produit = Produit::findOrFail($prod_id);
        $produser = User::findOrFail($Produit->user_id);
        

        if($user->role== 'admin'){
            if($produser->role== 'admin'){
                return view('Produit/ImageProduit/addimg')->with('prod_id',$prod_id);
            }else{
                return redirect()->route('ImgProduit',['prod_id'=>$prod_id]);
            }
        }elseif($user->role == 'client'){
            if($produser== $user){
                return view('Produit/ImageProduit/addimg')->with('prod_id',$prod_id);
            }else{
                return redirect()->route('ImgProduit',['prod_id'=>$prod_id]);
            }
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data=$request->validate($this->validation());

        $data['image'] = $request->image->store('uploads','public');
        $data['prod_id'] = $request->prod_id;
        // $data['prod_id'] = 3;
        

        $ImageProduit=ImageProduit::create($data);
        
        
        return redirect()->route('ImgProduit',['prod_id'=>$request->prod_id])->with('Addimg', 'Image successfully add');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageProduit  $imageProduit
     * @return \Illuminate\Http\Response
     */
    public function show(ImageProduit $imageProduit)
    {
        //
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageProduit  $imageProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageProduit $imageProduit)
    {
        //
    }
    public function editeimg($imgid,$prodid)
    {
        $user = Auth::user();

        $Produit = Produit::findOrFail($prodid);
        $produser = User::findOrFail($Produit->user_id);
        
        $ImageProduit = ImageProduit::findOrFail($imgid);

        $prodimg=$ImageProduit->prod_id;

        if($prodimg== $prodid){
            if($user->role== 'admin'){
                if($produser->role== 'admin'){
                    return view('Produit/ImageProduit/editimg',['imgprod' => ImageProduit::findOrFail($imgid),'prodid' => $prodid]);
                }else{
                    return redirect()->route('ImgProduit',['prod_id'=>$prodid]);
                }
            }elseif($user->role == 'client'){
                if($produser== $user){
                    return view('Produit/ImageProduit/editimg',['imgprod' => ImageProduit::findOrFail($imgid),'prodid' => $prodid]);
                }else{
                    return redirect()->route('ImgProduit',['prod_id'=>$prodid]);
                }
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
        
    }
    public function ChangeimgPrincipale($imgid,$prodid)
    {
        $ImageProduit = ImageProduit::findOrFail($imgid);
        $Produit = Produit::findOrFail($prodid);

        $var=$Produit->photo;
        $Produit->photo=$ImageProduit->image;
        $ImageProduit->image=$var;

        $ImageProduit->save();
        $Produit->save();


        return redirect()->route('ImgProduit',['prod_id'=>$prodid])->with('ChangeImage', 'Main Image of this Product was successfully changed');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageProduit  $imageProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        

        if($request->image == null){
            $data['image']= $request->animage;
            ImageProduit::where('id', $id)->update($data);
            return redirect()->route('ImgProduit',['prod_id'=>$request->prodid])->with('updateImage', 'Nothing has changed');

        }else{
            $data=$request->validate($this->validation());
            $data['image']= $request->image->store('uploads','public');
            ImageProduit::where('id', $id)->update($data);
            return redirect()->route('ImgProduit',['prod_id'=>$request->prodid])->with('updateImage', 'Image has been successfully updated');

        }
        
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageProduit  $imageProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageProduit $imageProduit)
    {
        //
    }
    
    public function deleteimg(Request $request)
    {
        
        
        $ImageProduit = ImageProduit::findOrFail((int)$request->idimgprod)->delete();
        
        return redirect()->route('ImgProduit',['prod_id'=>$request->idprod])->with('deleteimg', 'Image successfully deleted');
    }
    
    private function validation()
    {
        return [
            'image' => 'required|file|image'
        ];
    }
}
