@extends('layouts.app')
@section('title', ' Cart')
@section('content')
    <div class="main-content-wrapper d-flex clearflex ">
        @include('layouts.navgauche')
           <!-- @if (session('editPanier'))
                <div style="height:50px; width:60%;" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('editPanier') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif  
                @if (session('addPanier'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('addPanier') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('deletePanier'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('deletePanier') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
         -->
            @if($total == 0)
                <h3 class="text-warning">Votre panier est vide ! </h3>
            @else
                <table class="table table-striped" style="width:50%" >
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($list_panier as $panier)
                            <tr>
                                <td><img class="card-img-top" style="width: 90px; height:90px;" src="{{asset('img/image_projet/'.$panier->photo)}}" alt="{{$panier['name']}}"></td>
                                <td><a href="{{ route('panier.show',$panier->id) }}"> {{$panier['name']}}</a></td>
                                <td>{{$panier['quantity_prod']}}</td>
                                <td>{{$panier->price}}</td>
                                <td>
                                    <form action="{{route('panier.edit',$panier['id'])}}" method="get">
                                        @csrf
                                        <button class="btn btn-outline-success float-left" type="submit">Edit</button>
                                    </form>
                                    <form action="{{route('panier.destroy',$panier['id'])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$total}}</td>
                            <td><a class="btn btn-outline-success" href="{{route('paiement.create')}}">Commander</a></td>
                        </tr>
                    </tbody>
                </table>
            @endif
    </div>


  
    @include('layouts.footer')  
 
@endsection
