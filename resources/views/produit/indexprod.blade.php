@extends('layouts.app')

@section('title', ' Produits')

@section('content')

@if (session('AddProduit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('AddProduit') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deleteProduit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('deleteProduit') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<a href="{{ route('Produit.create') }}" class="btn btn-outline-primary btn-lg float-right" role="button" aria-pressed="true">Ajouter un Produit</a>
<h1>List des Produits</h1>
<div class="row">
    <div class="col">
        <ul class="list-group">
            @foreach ($produits as $prod)
            <a href="{{ route('Produit.show', $prod->id) }}">
                {{$prod->name}}
            </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection
