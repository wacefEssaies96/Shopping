
@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
        <form action="{{route('commande.store')}}" method="post">
            @csrf
            <div class="" style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                @foreach($list_commande as $item)
                <div class="card" style="width: 18rem; height:auto; ">
                    <img style="width:250px; height:280px;" class="card-img-top" src="{{asset('storage/'.$item->photo)}}" alt="Card image cap">    
                    <div class="card-body">
                        <h5 class="card-title">Name : {{$item->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Price : </strong><div class="text-success">{{$item->price}} $</div></h6>
                        <p class="card-text">Description : {{$item->description}}</p>
                        <p class="card-text">Quantity : {{$item->quantity_prod}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="text-success">Total price : {{$total}}</p>
            <div class="form-group">
                <label for="livraison">Livraison : </label>
                <select class="form-control" name="select" id="select">
                    <option value="0">Sans</option>
                    <option value="1">Avec</option>
                </select>
                
            </div>
            <button type="submit" class="btn btn-outline-success">Passer la commande</button>
    </form> 
</div>
@include('layouts.footer')  
 
@endsection