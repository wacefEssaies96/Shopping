
@extends('layouts.auth')

@section('title', ' OurProduct')

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
        
      <div class="card-header">

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
        <a href="{{ route('Produit.create') }}" class="btn  btn-primary  float-right" >Add Product</a>
            
        <h1>List of Our Products</h1>
        <div class="card-body">
                @if($total == 0)
                    <h3 class="text-warning"> The admistration did not add any product ! </h3>
                @else
            
        <div class="table-responsive">
          <table class="table text-center">
            <thead class=" text-primary">
                <th>Picture</th>
                <th>Name</th>
                <th>Add on the site</th>
                <th >Pictures</th>
            </thead>
            <tbody>
                @foreach ($produits as $prod)

                    <tr>
                        <td class="cart_product_img">
                            <a href="#"><img src="{{asset('storage/'.$prod->photo)}}" alt="{{$prod['name']}}"></a>
                            
                        </td>
                        <td class="cart_product_desc">
                            <a href="{{ route('ConsulterProduit',['prodid' =>  $prod->id ]) }}" >
                                <h6>{{$prod->name}}</h6><!-- Consulter -->
                            </a>
                        </td>
                        <td >
                            @if($prod->confirm)
                                Eleminate from the site
                            @else
                                add on the site

                                <!-- @if($prod->DemandeEnvoyer)
                                    <a href="#" id="d" onClick="d('{{$prod['id']}}');" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteModal"> Cancel this Request </a>
                                    
                                @else
                                    <form action="{{ route('Demandes.store') }}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="prod" value="{{$prod['id']}}"  id="prod" class="form-control" >
                                            
                                        <button type="submit" name="submit" class="btn btn-warning"> Add Demands </button>
                                    </form> 
                                @endif-->
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ImgProduit',['prodid' =>  $prod->id ]) }}" class="btn btn-success">
                                Manage images
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        @endif
        
        {{ $produits->links()}}
      </div>
    </div>
  </div>
</div>
<!-- 
<script>

    function d(id){
        document.getElementById('input').value = id;
    }
</script>
<!-- Modal ->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product from Demand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Are you sure to delete your request to add this Product to the site ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#delete-Demande-form').submit();">Confirm </button>
        </div>
        <form id="delete-Demande-form" action="{{ route('deleted') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input name="id" id="input" type="hidden" value="">
            <button style="display:none;" id="button" type="submit"></button>
        </form>
    </div>
    </div>
</div> -->

@endsection