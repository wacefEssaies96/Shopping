@extends('layouts.app')

@section('title', 'Edit Product')
@section('content')
 
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="col-12 col-lg-10">
                <div class="checkout_details_area mt-50 clearfix">
                    <div  class="h4 text-gray-900 mb-4 text-warning ">
                        Edit your Product
                    </div>
                    <form action="{{ route('Produit.update', $Produit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" >Name</label>
                                <input type="text" name="name" value="{{ old('name')  ?? $Produit->name }}"  id="name" class="form-control" >
                                @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="price">Price</label>
                                <input type="Number" name="price"  min="1"  value="{{ old('price') ?? $Produit->price}}"  id="price" class="form-control" >
                                @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="Number" name="quantity"  value="{{ old('quantity') ?? $Produit->quantity}}"  id="quantity"  min="1" max="20" class="form-control" >
                                @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="categorie">Categorie</label>

                                <select id="categorie" name="categorie"  class="w-100 ">
                                    <option   value="{{ old('categorie')   ?? $Produit->categorie}}"  >{{ old('categorie')   ?? $Produit->categorie}}</option>
                                    <option   value="Aucun categorie"  >Aucun categorie</option>
                                    <option   value="Informatique">Informatique</option>
                                    <option   value="Alimentaire">Alimentaire</option>
                                    <option   value="Bureatique">Bureatique</option>
                                    <option  value="Vehicule">Vehicule</option>
                                    <option   value="Electroménager">Electroménager</option>
                                    <option   value="Maison">Maison</option>
                                    <option   value="Bricolage">Bricolage</option>
                                </select>

                                @error('categorie')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 mb-3">
                                <label for="description">Description de produit</label>
                                
                                <textarea rows="4" cols="50" name="description"  value="{{ old('description')  ?? $Produit->description}}"  id="description" class="form-control">
                                {{ old('description')  ?? $Produit->description}}

                                </textarea>
                                @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6 mb-3">
                                <label > Image   </label>
                                <input id="photo" type="file"  name="photo" class="form-control"  >
                                <input type="hidden" name="anphoto"  value="{{ old('photo')  ?? $Produit->photo}}"  id="anphoto" class="form-control" >
                                <!-- if( photo not null){
                                    <label > You change your image to    </label>
                                    <img style="float:right; width:300px; height:200px;" src="photo name" alt="Path not correct">
                                }else{
                                    You don't change the image
                                } -->
                            @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6 mb-3 ">
                                <img  src="{{asset('storage/'.$Produit->photo)}}" alt="{{$Produit['name']}}">
                            
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" name="submit" class="btn amado-btn ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection