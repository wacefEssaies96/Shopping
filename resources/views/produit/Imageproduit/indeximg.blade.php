@extends('layouts.app')

@section('content')

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
            <div class="container-fluid">
            @if (session('ChangeImage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('ChangeImage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if($Produit->confirm==0)
                <a href="{{ route('createimgProduit',['prodid' =>  $Produit->id ]) }}" class="btn btn-primary  float-right" role="button" aria-pressed="true">
                    ADD Image
                </a>
            @else
                <div class="float-right text-danger" >
                    You can not ADD Image.
                    <br>
                    Your product on the site.
                </div>
            @endif
            <hr>
            <div class="row text-center">   <h3>Main Image </h3> </div>
            <hr>
            <a href="#"><img src="{{ asset('storage/'.$Produit->photo) }}" alt="{{ $Produit['name'] }}"></a>
    
            
            <div class="row">
                <div class="col">
                    @if($total == 0)
                        <h3 class="text-warning"> Your did not add another image to this product ! </h3>
                    @else
                    <hr>
                    <div class="row text-center">   <h3>Others Images </h3> </div>
                    <hr>

                    <div class="products_container grid">
                        
                        @foreach($ImageProduit as $imgprod)
                            <!-- Product -->
                            <div class="product grid-item hot">
                                <div class="product_inner">
                                    <div class="product_image">
                                        <img src="{{asset('storage/'.$imgprod->image)}}" style="width:100%;height:100%;" alt="">
                                        <a href="{{ route('ChangeimgPrincipale',['imgid' =>  $imgprod->id,'prodid' =>  $Produit->id ] ) }}" >
                                            <div class="product_tag">Change</div>
                                        </a>
                                    </div>
                                    <div class="product_content text-center">
                                        
                                        @if($Produit->confirm==0 )
                                            <div class="product_button ml-auto mr-auto trans_200">
                                                <a href="{{ route('editeimgProduit',['imgid' =>  $imgprod->id,'prodid' =>  $Produit->id ] ) }}" class="btn btn-warning" >Edit</a>
                                            </div>
                                            <div class="product_button ml-auto mr-auto trans_200">
                                                <a id="d" onClick="d('{{$imgprod->id}}','{{$Produit->id}}');" class="btn btn-danger" href="#"  >
                                            
                                                <!-- data-toggle="modal" data-target="#confirmDeleteModal"> -->
                                                    DELETE
                                                </a>
                                            </div>
                                            
                                        @endif 
                                        <!-- <div class="product_title"><a href="product.html">long red shirt</a></div>
                                        <div class="product_price">$39.90</div>
                                        <div class="product_button ml-auto mr-auto trans_200"><a href="#">add to cart</a></div> -->
                                    </div>
                                </div>	
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    
  
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