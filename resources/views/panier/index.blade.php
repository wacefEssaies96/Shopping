@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    @if($list_panier)
        <h3>Prix total : {{ $total }}</h3> 
        <table class="table table-striped" style=" width:700px; margin-top:100px;">
            <thead>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach($list_panier as $panier)
                <tr>
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
            
            </tbody>
        </table>
        @else
            test
        @endif
        
        </div>
    @include('layouts.footer')  
 
@endsection
