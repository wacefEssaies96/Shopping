@extends('layouts.app')

@section('title', ' Produits')

@section('content')

@if (session('AddDemande'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('AddDemande') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deleteDemande'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('deleteDemande') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                    <a href="{{ route('ConsulterProduit',['prodid' =>  $prod->id ]) }}" class="btn btn-success">
                        Consulter
                    </a>
                </div>
                <div class="col-lg-2">
                    @if($prod->confirm)
                        Votre Produit sur le site
                    @else
                        @if($prod->DemandeEnvoyer)
                            <a href="#" class="btn btn-outline-danger"  data-toggle="modal" data-target="#confirmDeleteModal">
                                Anuuler cette Demande
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Produit from demande</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure to delete your demande to add this Produit to the site ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="event.preventDefault();
                                        document.querySelector('#delete-Produit-form').submit();">Confirm delete</button>
                                    </div>
                                    <form id="delete-Produit-form" action="{{ route('Demandes.destroy',$prod['id']) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                </div>
                            </div>
                        @else
                        <form action="{{ route('Demandes.store') }}" method="post">
                            @csrf
                            
                            <input type="hidden" name="prod" value="{{$prod['id']}}"  id="prod" class="form-control" >
                                
                            <button type="submit" name="submit" class="btn btn-primary">Envoyer une Demande </button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
            @endforeach
        </ul>
    </div>
</div>


  
@endsection
