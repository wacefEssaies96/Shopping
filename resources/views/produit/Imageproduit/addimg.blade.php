@extends('layouts.form')

@section('title', 'Ajouter Image Produit')
@section('content')

<div class="row justify-content-center" >
    <fieldset class="col-lg-6" style="color: white;background-image: url({{ asset('img/bg-img/bgprimary1.jpg') }});background-repeat: no-repeat;size:100% 100%;background-size: 100% 100%;padding: 30px 30px;border-radius:30px;"> 
        <div class="h4 text-gray-900 mb-4 text-warning ">Ajouter Image </div>
        <form action="{{ route('ImageProduit.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden"  name="prod_id" value="{{$prod_id}}">
                    

            <div >
                <div class="row form-groupe">
                    <label > Image   </label>
                    <input type="file"  name="image" class="form-control"  placeholder="Entrer La Photo de produit">
                    
                    @error('image')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary "> Ajouter </button>
                </div>
            </div>
        </form>
    </fieldset>
</div>
@endsection