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
            <div class="row">
                <div class="col-lg-2">
                    Nom de Produit
                </div>
                <div class="col-lg-4 text-center">
                    Operation
                </div>
            </div>
            @foreach ($produits as $prod)
            
            <div class="row">
                <div class="col-lg-2">
                    {{$prod->name}}
                </div>
                <div class="col-lg-2">
                    <a href="{{ route('Produit.show', $prod->id) }}">
                        Consulter
                    </a>
                </div>
                <div class="col-lg-2">
                    @if($prod->confirm)
                        Demande Envoyer
                    @else
                    <form action="#" method="post">
                    <!-- {{ route('Demandes.store') }} -->
                         @csrf
                        
                        <input type="text" name="prod" value="{{$prod->id}}"  id="prod" class="form-control" disabled>
                            
                        <button type="submit" name="submit" class="btn btn-primary">Envoyer une Demande </button>
                    </form>
                        <!-- <a href="{{ route('Demandes.store') }}">
                            Envoyer une Demande
                        </a> -->
                    @endif
                </div>
            </div>
            @endforeach
        </ul>
    </div>
</div>
@endsection
