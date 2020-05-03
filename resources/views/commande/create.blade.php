
@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
        <form action="{{route('commande.store')}}" method="post">
            @csrf
            <div class="" style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                @foreach($list_commande as $item)
                <div class="card" style="width: 18rem; height:250px; ">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$item->price}} $</h6>
                        <p class="card-text">{{$item->description}}</p>
                        
                    </div>
                    
                </div>
                
                @endforeach
            </div>
            <label for="livraison">Livraison : </label>
                        <select name="select" id="select">
                            <option value="0">Sans</option>
                            <option value="1">Avec</option>
                        </select>
            <button type="submit" class="btn btn-outline-success">Submit</button>
    </form> 
</div>
@include('layouts.footer')  
 
@endsection