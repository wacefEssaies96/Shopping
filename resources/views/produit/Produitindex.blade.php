@extends('layouts.app')



@section('content')




<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <p>Showing 1-8 0f 25</p>
                            <div class="view d-flex">
                                <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <form action="#" method="get">
                                    <select name="select" id="sortBydate">
                                        <option value="value">Date</option>
                                        <option value="value">Newest</option>
                                        <option value="value">Popular</option>
                                    </select>
                                </form>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                                <form action="#" method="get">
                                    <select name="select" id="viewProduct">
                                        <option value="value">12</option>
                                        <option value="value">24</option>
                                        <option value="value">48</option>
                                        <option value="value">96</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1> Produit Sur le sites</h1>

            <div class="row">
                @foreach($produits as $produit)
                    @if($produit->confirm)
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('img/image_projet/'.$produit['photo']) }}" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src="{{ asset('img/image_projet/'.$produit['photo']) }}" alt="">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price">{{$produit['price']}} DT</p>
                                        <!-- <a href="{{ route('Produit.show', $produit->id) }}"> -->
                                            <h6>{{$produit['name']}}</h6>
                                        <!-- </a> -->
                                    </div>
                                    <!-- Ratings & Cart -->
                                    <div class="ratings-cart text-right">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('ConsulterProduit',['prodid' =>  $produit->id ]) }}" class="btn btn-success">
                                                Consulter
                                            </a>
                                        </div>
                                        <!-- <div >
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to Cart">
                                                <img src="{{ asset('img/core-img/cart.png') }}" alt="">
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <h1> Produit des Clients</h1>
            <div class="row">
                @foreach($produits as $produit)
                
                    @if(!($produit->confirm))
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('img/image_projet/'.$produit['photo']) }}" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src="{{ asset('img/image_projet/'.$produit['photo']) }}" alt="">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price">{{$produit['price']}} DT</p>
                                        <!-- <a href="{{ route('Produit.show', $produit->id) }}"> -->
                                            <h6>{{$produit['name']}}</h6>
                                        <!-- </a> -->
                                    </div>
                                    <!-- Ratings & Cart -->
                                    <div class="ratings-cart text-right">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('ConsulterDetailleProduit',['prodid' =>  $produit->id,'userid' =>  $produit->user_id ]) }}" class="btn btn-primary">
                                                Consulter
                                            </a>
                                        </div>
                                        <!-- <div class="cart">
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to Cart">
                                                <img src="{{ asset('img/core-img/cart.png') }}" alt="">
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination justify-content-end mt-50">
                            <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                            <li class="page-item"><a class="page-link" href="#">02.</a></li>
                            <li class="page-item"><a class="page-link" href="#">03.</a></li>
                            <li class="page-item"><a class="page-link" href="#">04.</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
</div>
@endsection
