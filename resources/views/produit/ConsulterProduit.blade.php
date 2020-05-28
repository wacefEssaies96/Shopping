@extends('layouts.app')

@section('content')
@include('layouts.searchWrapper')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')

    <!-- Product Details Area Start  -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                @if (session('updateProduit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateProduit') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                  <div class="col-12">
                      <nav aria-label="breadcrumb">
                      <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Produit</a></li>
                        <li class="breadcrumb-item"><a href="#">{{$Produit->name}}</a></li>
                      </ol>
                    </nav>
                  </div>
                </div>
              <div class="row">
              <div class="col-12 col-lg-7">
                      <div class="single_product_thumb">
                          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                
                                  
                                    @if($total != 0)
                                        {{$counter = 1}} 
                                        <li class="active" data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                        </li>
                                        @foreach ($ImageProduit as $imgprod)       
                                            {{$counter+=1}}
                                            <li data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$imgprod['image']) }});">
                                            </li>
                                        @endforeach
                                    @endif
                              </ol>
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="ID img prod  {{$Produit['id']}}">
                                      </a>
                                  </div>
                                  
                                  @if($total != 0)
                                        @foreach ($ImageProduit as $imgprod)
                                            <div class="carousel-item">
                                                <a class="gallery_img" href="{{ asset('storage/'.$imgprod['image']) }}">
                                                    <img class="d-block w-100" src="{{ asset('storage/'.$imgprod['image']) }}" alt="ID img prod {{$imgprod['id']}}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                              </div>
                          </div>
                      </div>
                  </div>

                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{ $Produit->price }} DT</p>
                            <a href="#"><!--product-details.html-->
                                <h6>{{ $Produit->name }}</h6>
                            </a>
                            
                        </div>

                        <div class="short_overview my-5">
                          <p>{{ $Produit->description }}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post">
                            @admin
                                @if($produser->role=='admin')
                                    <a href="{{ route('Produit.edit', $Produit->id) }}" class="btn amado-btn">Edit</a>
                                    <a href="#"  class="btn amado-btn" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                                @else
                                    C'est produit d'un client
                                @endif
                            @endadmin
                            @client
                                @if($Produit->user_id == $user->id )
                                    @if($Produit->confirm)
                                      Your Product on the site You cannot modify or delete it
                                    @else
                                        <a href="{{ route('Produit.edit', $Produit->id) }}" class="btn amado-btn">Edit</a>
                                        <a href="#" class="btn amado-btn" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                                        
                                    @endif 
                                @endif 
                            @endclient
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Are you sure to delete your Product ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#delete-Product-form').submit();">Confirm </button>
        </div>
        <form id="delete-Product-form" action="{{ route('Produit.destroy', $Produit->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    </div>
</div>
@include('layouts.footer')   

    
@endsection
