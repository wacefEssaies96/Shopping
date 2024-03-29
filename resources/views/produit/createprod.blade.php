
@extends('layouts.app')
@section('title', 'Add Product')


@section('content')



    <div class="main-content-wrapper d-flex clearfix">
        @include('layouts.navgauche')
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                    <div class="col-12 col-lg-10">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="h4 text-gray-900 mb-4 text-warning ">
                                Add Product
                            </div>
                            <form  action="{{ route('Produit.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="name" >Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"  id="name" class="form-control" placeholder="Please enter the name of the product">
                                    @error('name')<div class="text-danger ">{{ $message }}</div> @enderror
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12  mb-3">
                                    <label for="price">Price</label>
                                    <input type="Number" name="price"  min="1"  value="{{ old('price') }}"  id="price" class="form-control" placeholder="Please enter the price of the product">
                                    @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="Number" name="quantity"  value="{{ old('quantity') }}"  id="quantity"  min="1" max="20" class="form-control" placeholder="Quantity">
                                    @error('quantity')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="categorie">Categorie</label>
                                    <select id="categorie" name="categorie"  class="w-100 ">
                                        <option   value="{{ old('categorie') }}"  >Aucun categorie</option>
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
                                <br>
                                
                                <div class="row">
                                <div class="col-12 mb-3">

                                    <label for="description">Description </label>
                                    
                                    <textarea rows="4" cols="30" name="description"  value="{{ old('description') }}"  id="description" class="form-control w-100"  placeholder="Entrer La description de produit">
                                    {{ old('description')}}

                                    </textarea>
                                    @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12  mb-3">
                                    <label > Image   </label>
                                    <input type="file"  name="photo" class="form-control"  placeholder="Entrer La Photo de produit">
                                    
                                    @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" name="submit" class="btn amado-btn "> Ajouter </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection