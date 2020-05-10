@extends('layouts.app')
@section('content')
    <div class="main-content-wrapper d-flex clearflex ">
        @include('layouts.navgauche')
        <div class="card" style="width: 35rem; height:auto; margin-left:15%; margin-bottom:5%; ">
        <img class="card-img-top"  src="{{asset('img/image_projet/'.$produit->photo)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$produit->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$produit->price}} $</h6>
                <p class="card-text">{{$produit->description}}</p>
                <form action="{{ route('panier.update',$panier->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="quantity_prod">Quantity : </label>
                        <input class="form-control" min="1" max="{{$produit->quantity}}" type="number" name="quantity_prod" id="quantity_prod" value="{{ old('quantity_prod') ?? $panier->quantity_prod }}">
                    </div> 
                    <button class="btn btn-outline-primary" type="submit">Confimer</button>
                </form>
            </div>          
        </div>
    </div>
    @include('layouts.footer') 
@endsection
    
               
              
                
              
            