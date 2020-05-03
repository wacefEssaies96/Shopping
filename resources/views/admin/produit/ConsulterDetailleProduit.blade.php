@extends('layouts.app')

@section('title', ' Produits')

@section('content')
<table>
    <tr >
        <td >id</td>
        <td>--------</td>
        <td>nom</td>
        <td>--------</td>
        <td>table</td>
    </tr>
    <tr>
        <td>{{ $user->id}}</td>
        <td>--------</td>
        <td>{{ $user->name}}</td>
        <td>--------</td>
        <td>User</td>
    </tr>
    <tr>
        <td>{{ $Produit['id'] }}</td>
        <td>--------</td>
        <td>{{ $Produit['name'] }}</td>
        <td>--------</td>
        <td>produit</td>
    </tr>
    
    
</table>
        
@endsection
        