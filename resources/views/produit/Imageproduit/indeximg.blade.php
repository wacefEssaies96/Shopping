@extends('layouts.app')

@section('content')



    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        @include('layouts.navgauche')

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
            @if (session('Addimg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Addimg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('updateImage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateImage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('deleteimg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteimg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <a href="{{ route('createimgProduit',['prodid' =>  $Produit->id ]) }}" class="btn btn-primary  float-right" role="button" aria-pressed="true">
               
                Ajouter une Image
            </a>
            <hr>
                
            <div class="row"> Image Principale </div>
            <a href="#"><img src="{{ asset('storage/'.$Produit->photo) }}" alt="{{ $Produit['name'] }}"></a>
    
        <div class="row">
            @if($total == 0)
                <h3 class="text-warning">Votre N'avez ajouter autre Image a ce Produit ! </h3>
            @else
                <div class="row"> Autre Image </div>
                @foreach($ImageProduit as $imgprod)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img style="height:300px;" src="{{asset('storage/'.$imgprod->image)}}" alt="{{$imgprod->id}}{{$imgprod->price}}">
                               
                            </div>

                            @if($Produit->confirm==0)
                                <a href="{{ route('ChangeimgPrincipale',['imgid' =>  $imgprod->id,'prodid' =>  $Produit->id ] ) }}" class="btn amado-btn">Change</a>
                                
                                <a href="{{ route('editeimgProduit',['imgid' =>  $imgprod->id,'prodid' =>  $Produit->id ] ) }}" class="btn amado-btn">Edit</a>
                                <a id="d" onClick="d('{{$imgprod->id}}','{{$Produit->id}}');" href="#" class="btn btn-outline-danger" >
                                <!-- data-toggle="modal" data-target="#confirmDeleteModal"> -->
                                    Supprimer
                                </a>
                                
                            @endif 
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')
  
<script>
    function d(imgid,prodid){
        
        document.getElementById('inputimg').value = imgid;
        document.getElementById('inputprod').value = prodid;
        document.getElementById('button').click();
    }
</script>
<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete this Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Are you sure to delete  this Image ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#delete-Produit-form').submit();">Confirm delete</button>
        </div>
        <form id="delete-Produit-form" action="{{ route('deleteimg') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input name="idimgprod" id="inputimg" type="hidden" value="">
            <input name="idprod" id="inputprod" type="hidden" value="">
            <button style="display:none;" id="button" type="submit"></button>
        </form>
    </div>
    </div>
</div> 
@endsection