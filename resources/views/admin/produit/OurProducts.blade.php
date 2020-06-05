
@extends('layouts.auth')

@section('title', ' OurProduct')

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="card">

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
        @if (session('noconfirmProducts'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('noconfirmProducts') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif    
        @if (session('confirmProducts'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('confirmProducts') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif    
        <div class="card-header">
            <h1>List of Our Products</h1>
            <a href="{{ route('Produit.create') }}" class="btn  btn-primary  float-right" >Add Product</a>
        </div>
        <div class="card-body">
            @if($total == 0)
                <h3 class="text-warning"> The admistration did not add any product ! </h3>
            @else
             
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th colspan="4">Administrator</th>
                        <th colspan="4">Product</th>
                        <th colspan="4">Operation</th>
                    </thead>
                    <tbody>
                            
                        @foreach ($produits as $prod)
                            @foreach ($users as $us)
                                @if( $us->id==$prod->user_id && $us->role=="admin")
                                    <tr>
                                        <td colspan="4">
                                            <a href="{{ route('Usershow',['userid' =>  $us->id ]) }} ">
                                                <h4>{{$us->name}}</h4>
                                                <img class="img-profile rounded-circle"   src="{{asset('images/'.$us->image)}}"  onerror="this.style.display='none'">
                                            </a>
                                            
                                        </td>

                                        <td colspan="4">
                                            <a href="{{ route('ConsulterProduit',['prodid' =>  $prod->id ]) }}" >
                                                <h4>{{$prod->name}}</h4>
                                                <img width="100%" src="{{asset('storage/'.$prod->photo)}}" onerror="this.style.display='none'">
                                            </a>
                                            
                                        </td>
                                        <td  colspan="4">
                                        
                                            <br>
                                            <br>
                                            <a href="{{ route('ImgProduit',['prodid' =>  $prod->id ]) }}" class="btn btn-success">
                                                Manage images
                                            </a>
                                            <br>
                                            <hr>
                                            <br>
                                            @if($prod->confirm)
                                                <a href="{{ route('noconfirmProducts',['prodid' =>  $prod->id ]) }}" class="btn btn-danger">
                                                    Eleminate from 
                                                    <br>
                                                    the site
                                                </a>
                                            @else
                                                <a href="{{ route('confirmProducts',['prodid' =>  $prod->id ]) }}" class="btn btn-primary">
                                                    add on the site
                                                </a>
                                            @endif
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
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