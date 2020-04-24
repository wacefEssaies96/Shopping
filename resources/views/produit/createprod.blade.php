@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    <fieldset>
        <legend>New booking</legend>
        <form action="{{ route('Produit.store') }}" method="post">
            @csrf

            <div class="jumbotron">
                <div class="row">
                    <div class="col">
                        <div class="form-groupe">
                            <label for="name" >Nom de produit</label>
                            <input type="text" name="name" value="{{ old('name') }}"  id="name" class="form-control" placeholder="Entrer Le Nom de produit">
                            @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-groupe">
                            <label for="price">Prix de produit</label>
                            <input type="Number" name="price"  min="1"  value="{{ old('price') }}"  id="price" class="form-control" placeholder="Entrer Le Prix de produit">
                            @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-groupe">
                            <label for="quantity">Quantity de produit</label>
                            <input type="Number" name="quantity"  value="{{ old('quantity') }}"  id="quantity"  min="1" max="20" class="form-control" placeholder="Entrer La quantity de produit">
                            @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-groupe">
                            <label for="categorie">Categorie de produit</label>
                            <input type="text" name="categorie"  value="{{ old('categorie') }}"  id="categorie" class="form-control" placeholder="Entrer La Categorie de produit">
                            @error('categorie')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-groupe">
                            <label for="description">Description de produit</label>
                            <input type="text" name="description"  value="{{ old('description') }}"  id="description" class="form-control" placeholder="Entrer La description de produit">
                            @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label > Image</label>
                    <div class="form-groupe">
                        <input type="file"  name="photo"  placeholder="Entrer La Photo de produit">
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Envoyer la demande </button>
            </div>
        </form>
    </fieldset>
@endsection