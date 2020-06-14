@extends('layouts.auth')

@section('title')
  All Prod
@endsection
 
@section('content')




    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                @foreach($produits as $produit)
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-4 col-md-12 col-xl-4" >
                            <div class="single-product-wrapper" >
                                <!-- Product Image -->
                                <div class="product-img" >
                                    <img style="height:200px;" src="{{ asset('storage/'.$produit['photo']) }}"  alt="{{$produit->id}}">
                                    
                                </div>


                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price">{{$produit['price']}} DT</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-center">
                                    <!-- Ratings -->
                                    <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                        <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{$produit->average_rating}}"  data-size="md" disabled >
                                    </div>
                                </div>
                                
                                <div class="col-lg-2">
                                    <a href="{{ route('ConsulterDetailleProduit',['prodid' =>  $produit->id,'userid' => $produit->user_id ]) }}" class="btn btn-success">
                                        Consulter
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            
            {{ $produits->links()}}
        </div>
    </div>
    
@endsection
