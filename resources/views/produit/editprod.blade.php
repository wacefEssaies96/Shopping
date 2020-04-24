@extends('layouts.app')

@section('title', 'Edit Produit')
@section('content')
    <fieldset>
        <legend>Edit your Produit</legend>
        <form action="{{ route('Produit.update', $Produit->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="jumbotron">
                <div class="row">
                    <div class="col">
                        <div class="form-groupe">
                            <label for="name" >Nom de produit</label>
                            <input type="text" name="name" value="{{ old('name') ?? $Produit->name }}"  id="name" class="form-control" placeholder="Entrer Le Nom de produit">
                            @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-groupe">
                            <label for="price">Prix de produit</label>
                            <input type="Number" name="price"  min="1"  value="{{ old('price') ?? $Produit->price}}"  id="price" class="form-control" placeholder="Entrer Le Prix de produit">
                            @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-groupe">
                            <label for="quantity">Quantity de produit</label>
                            <input type="Number" name="quantity"  value="{{ old('quantity') ?? $Produit->quantity }}"  id="quantity"  min="1" max="20" class="form-control" placeholder="Entrer La quantity de produit">
                            @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-groupe">
                            <label for="categorie">Categorie de produit</label>
                            <input type="text" name="categorie"  value="{{ old('categorie') ?? $Produit->categorie }}"  id="categorie" class="form-control" placeholder="Entrer La Categorie de produit">
                            @error('categorie')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-groupe">
                            <label for="description">Description de produit</label>
                            <input type="text" name="description"  value="{{ old('description') ?? $Produit->description}}"  id="description" class="form-control" placeholder="Entrer La description de produit">
                            @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <label > Image</label>
                        <div class="input-groupe">
                            <div class="custom-file">
                                <input type="file"  name="photo" class="custom-file-input" placeholder="Entrer La Photo de produit">
                                <label  class="custom-file-label" >Choisir une photo</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <button type="submit" class="btn btn-outline-primary btn-block">Confirm update</button>
                    </div>
                </div>
            </div>

        </form>
    </fieldset>
@endsection
