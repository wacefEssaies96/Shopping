<?php

namespace App\Http\Controllers;

use App\ImageProduit;
use App\Produit;
use Illuminate\Http\Request;

class ImageProduitController extends Controller
{
    public function ImgProduit($id)
    {
        
        $ImageProduit = ImageProduit::where('prod_id', $id)->get();
        $Produit = Produit::findOrFail($id);
        $total = 0;
        foreach($ImageProduit as $item){
            $total += 1;
        }
        return view('Produit/ImageProduit/indeximg', ['Produit' => $Produit,'ImageProduit' => $ImageProduit,'total'=> $total]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        // $ImageProduit = ImageProduit::where('prod_id', $id)->get();
        // $Produit = Produit::findOrFail($id);
        // $total = 0;
        // foreach($ImageProduit as $item){
        //     $total += 1;
        // }
        // return view('Produit/ImageProduit/index', ['Produit' => $Produit,'ImageProduit' => $ImageProduit,'total'=> $total]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prod_id)
    {
        // return view('Produit/ImageProduit/addimg')->with('prod_id',$prod_id);
        return view('Produit/ImageProduit/addimg')->with('prod_id',$prod_id);
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
        
        
        return redirect()->route('ImgProduit',['prod_id'=>$request->prod_id])->with('Addimg', 'Image ajouter successfully');
    

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
        return view('Produit/ImageProduit/editimg',['imgprod' => ImageProduit::findOrFail($imgid),'prodid' => $prodid]);
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


        return redirect()->route('ImgProduit',['prod_id'=>$prodid])->with('ChangeImage', 'Image Principale de ce Produit change successfully');
        
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
            return redirect()->route('ImgProduit',['prod_id'=>$request->prodid])->with('updateImage', 'No changes');

        }else{
            $data=$request->validate($this->validation());
            $data['image']= $request->image->store('uploads','public');
            ImageProduit::where('id', $id)->update($data);
            return redirect()->route('ImgProduit',['prod_id'=>$request->prodid])->with('updateImage', 'Image Produit updated successfully');

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
        
        return redirect()->route('ImgProduit',['prod_id'=>$request->idprod])->with('deleteimg', 'Image deleted successfully');
    }
    
    private function validation()
    {
        return [
            'image' => 'required|file|image'
        ];
    }
}
