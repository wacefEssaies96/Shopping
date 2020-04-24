@extends('layouts.app')
@section('content')
    <table class="table table-striped">
    <thead>
        <th>ProdId</th>
        <th>Quantity</th>
   
    </thead>
    <tbody>
    @foreach($list_panier as $panier)
        <tr>
            <td><a href="{{ route('panier.show',$panier->id) }}"> {{$panier['id']}}</a></td>
            <td>{{$panier['quantity_prod']}}</td>
            
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection