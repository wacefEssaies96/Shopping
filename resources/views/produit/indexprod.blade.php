
@extends('layouts.app')

@section('title', ' Produits')

@section('content')


<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
        <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
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
            <a href="{{ route('Produit.create') }}" class="btn btn-primary  float-right" role="button" aria-pressed="true">Ajouter un Produit</a>
            <h1>List des Produits</h1>
            @if($total == 0)
                <h3 class="text-warning">Votre N'avez ajouter aucun Produit ! </h3>
            @else
                <div class="row">
                    <div class="col-12 lg-6">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive  table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <!-- <th>Detaille</th> -->
                                        <th>Demande</th>
                                        <th >Images</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $prod)
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="#"><img src="{{asset('storage/'.$prod->photo)}}" alt="{{$prod['name']}}"></a>
                                                
                                            </td>
                                            <!-- <td>
                                                
                                            </td> -->
                                            <td class="cart_product_desc">
                                                <a href="{{ route('ConsulterProduit',['prodid' =>  $prod->id ]) }}" >
                                                    <h6>{{$prod->name}}</h6><!-- Consulter -->
                                                </a>
                                            </td>
                                            <td >
                                                @if($prod->confirm)
                                                    Votre Produit sur le site
                                                @else
                                                    @if($prod->DemandeEnvoyer)
                                                    <a id="d" onClick="d('{{$prod['id']}}');" href="#" class="btn btn-outline-danger" >
                                                    <!-- data-toggle="modal" data-target="#confirmDeleteModal"> -->
                                                        Anuuler cette Demande
                                                    </a>
                                                    @else
                                                        <form action="{{ route('Demandes.store') }}" method="post">
                                                            @csrf
                                                            
                                                            <input type="hidden" name="prod" value="{{$prod['id']}}"  id="prod" class="form-control" >
                                                                
                                                            <button type="submit" name="submit" class="btn btn-primary">Envoyer une Demande </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('ImgProduit',['prodid' =>  $prod->id ]) }}" class="btn btn-success">
                                                    Gerer les images
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            {{ $produits->links()}}
        </div>
    </div>
</div>

<script>
    function d(id){
        
        document.getElementById('input').value = id;
        document.getElementById('button').click();
    }
</script>
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
        <form id="delete-Produit-form" action="{{ route('deleted') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input name="id" id="input" type="hidden" value="">
            <button style="display:none;" id="button" type="submit"></button>
        </form>
    </div>
    </div>
</div>

@endsection