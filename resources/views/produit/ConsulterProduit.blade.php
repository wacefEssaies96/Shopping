@extends('layouts.app')

@section('content')

@if (session('updateProduit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('updateProduit') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')

    <!-- Product Details Area Start  -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
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
                                  <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                  </li>
                                  <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                  </li>
                                  <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                  </li>
                                  <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                  </li>
                              </ol>
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="First slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="Second slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="Third slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="Fourth slide">
                                      </a>
                                  </div>
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
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="review">
                                    <a href="#">Write A Review</a>
                                </div>
                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
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
                                        Votre Produit sur le site Vous ne pouvez ni modifier ni supprimer
                                    @else
                                        <a href="{{ route('Produit.edit', $Produit->id) }}" class="btn amado-btn">Edit</a>
                                        <a href="#" class="btn amado-btn" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                                        
                                    @endif 
                                @endif 
                            @endclient
                             <!-- Modal -->
                             <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure to delete your Produit ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-danger" onclick="event.preventDefault();document.querySelector('#delete-Produit-form').submit();">Confirm delete</button>
        </div>
        <form id="delete-Produit-form" action="{{ route('Produit.destroy', $Produit->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
      </div>
    </div>
  </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->


  
  <!-- Modal -->
  <!-- <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure to delete your Produit ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#delete-Produit-form').submit();">Confirm delete</button>
        </div>
        <form id="delete-Produit-form" action="{{ route('Produit.destroy', $Produit->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
      </div>
    </div>
  </div> -->
  
@include('layouts.footer')   

    
@endsection
