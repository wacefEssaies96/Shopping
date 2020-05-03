@extends('layouts.form')

@section('title', 'Edit Produit')


@section('content')
<div class="row justify-content-center">
    <fieldset class="col-lg-6"> 
        <legend class="h4 text-gray-900 mb-4 text-warning ">Edit your Produit</legend>
        <form action="{{ route('Produit.update', $Produit->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="jumbotron">
            
                <div class="row form-groupe">
                    <label for="name" >Nom de produit</label>
                    <input type="text" name="name" value="{{ old('name')  ?? $Produit->name }}"  id="name" class="form-control" >
                    @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row form-groupe">
                    <label for="price">Prix de produit</label>
                    <input type="Number" name="price"  min="1"  value="{{ old('price') ?? $Produit->price}}"  id="price" class="form-control" >
                    @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>


                <div class="row">
                    <div class="col-lg-6 form-groupe">
                        <label for="quantity">Quantity de produit</label>
                        <input type="Number" name="quantity"  value="{{ old('quantity') ?? $Produit->quantity}}"  id="quantity"  min="1" max="20" class="form-control" >
                        @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-lg-6 form-groupe" >
                        <label for="categorie">Categorie de produit</label>

                        <select id="categorie" name="categorie" class="form-control">
                            <option   value="{{ old('categorie') ?? $Produit->categorie }}"  >{{ $Produit->categorie }}</option>
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
                    
                    <textarea rows="4" cols="50" name="description"  value="{{ old('description')  ?? $Produit->description}}"  id="description" class="form-control">
                    {{ old('description')  ?? $Produit->description}}

                    </textarea>
                    @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row ">
                    <label > Image   </label>
                    <div class="form-groupe">
                        <input type="file"  name="photo" value="{{ old('photo')  ?? $Produit->photo}}" >
                    </div>
                    @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary "> Confirm update</button>
                </div>
            </div>
        </form>
    </fieldset>
</div>
@endsection