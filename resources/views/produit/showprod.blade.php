@extends('layouts.app')

@section('content')
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
                            @if($total != 0)
                                <ol class="carousel-indicators">
                                    {{$counter = 0}} 
                                    <li class="active" data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                    </li>
                                    @foreach ($ImageProduit as $imgprod)       
                                        {{$counter++}}
                                        <li data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$imgprod['image']) }});">
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
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
                        <!-- <form class="cart clearfix" method="post">
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{ $Produit->quantity }}">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div> -->
                            @if($Produit->user_id == $user )
                                C'est Votre Produit 
                                <br> Vous ne pouvez ni le modifier ni le supprimer
                                
                            @else
                            
                               
                                    <form action="{{route('panier.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Quantity : </label>
                                            
                                            <input class="form-control" value="1" min="1" max="{{$Produit->quantity}}" type="number"  type="number" name="qtt" id="qtt">
                                        </div>
                                        <input type="hidden" name="prod_id" id="prod_id" value="{{$Produit->id}}">
                                        <button class="btn amado-btn" type="submit"><img src="{{ asset('img/core-img/cart.png') }}" alt="">Add to cart</button>
                                    </form>
                                
                                <!-- <a href="{{ route('Produit.edit', $Produit->id) }}" class="btn amado-btn">Edit</a><--class="btn btn-outline-info"-->
                                <!-- <a href="#" class="btn btn-outline-danger" class="btn amado-btn" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a> -->
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>




    @include('layouts.footer')   
@endsection
