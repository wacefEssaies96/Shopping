@extends('layouts.form')

@section('title', 'New Booking')
@section('content')

<div class="row justify-content-center" >
    <fieldset class="col-lg-6"> 
        <legend class="h4 text-gray-900 mb-4 text-warning ">Ajouter Produit</legend>
        <form action="{{ route('Produit.store') }}" method="post">
            @csrf

            <div class="jumbotron">
                <div class="row form-groupe">
                    <label for="name" >Nom de produit</label>
                    <input type="text" name="name" value="{{ old('name') }}"  id="name" class="form-control" placeholder="Entrer Le Nom de produit">
                    @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row form-groupe">
                    <label for="price">Prix de produit</label>
                    <input type="Number" name="price"  min="1"  value="{{ old('price') }}"  id="price" class="form-control" placeholder="Entrer Le Prix de produit">
                    @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6 form-groupe">
                        <label for="quantity">Quantity de produit</label>
                        <input type="Number" name="quantity"  value="{{ old('quantity') }}"  id="quantity"  min="1" max="20" class="form-control" placeholder="Entrer La quantity de produit">
                        @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-lg-6 form-groupe" >
                        <label for="categorie">Categorie de produit</label>

                        <select id="categorie" name="categorie" class="form-control">
                            <option   value="{{ old('categorie') }}"  >Aucun categorie</option>
                            <option   value="Produit technologie">Produit technologie</option>
                            <option   value="Produit Alimentaire">Produit Alimentaire</option>
                            <option  value="Voiture">Voiture</option>
                        </select>
                       
                        @error('categorie')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <br>
                <div class="row form-groupe">

                    <label for="description">Description de produit</label>
                    
                    <textarea rows="4" cols="50" name="description"  value="{{ old('description') }}"  id="description" class="form-control"  placeholder="Entrer La description de produit">
                    {{ old('description')}}

                    </textarea>
                    @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row ">
                    <label > Image   </label>
                    <div class="form-groupe">
                        <input type="file"  name="photo"  placeholder="Entrer La Photo de produit">
                    </div>
                    @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
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