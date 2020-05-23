@extends('layouts.app')

@section('content')

    @include('layouts.searchWrapper')

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        @include('layouts.navgauche')

        @include('layouts.sideBar')

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('addPanier'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('addPanier') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('errorPanier'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('errorPanier') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing {{$produits->currentPage()}}-{{sizeOf($produits)}} 0f {{$produits->total()}}</p>
                                @if($categorie)
                                    <p>Categorie : {{$categorie}}</p>
                                @endif
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
                                    <form action="{{route('shop')}}" method="get">
                                        <select class="select" name="select" id="viewProduct" onChange="update();">
                                            <option id="d" disabled active >Choices</option>
                                            <option id="6" value="6">6</option>
                                            <option id="12" value="12">12</option>
                                            <option id="18" value="18">18</option>
                                            <option id="24" value="24">24</option>
                                        </select>
                                        <input name="search" id="search" type="hidden" value="{{$search}}">
                                        <input name="min" id="min" type="hidden" value="{{$min}}">
                                        <input name="max" id="max" type="hidden" value="{{$max}}">
                                        <input name="categorie" id="categorie" type="hidden" value="{{$categorie}}">
                                        <button style="display:none;" id="bouton" type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                @foreach($produits as $produit)
                    @if($produit->confirm)
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img style="height:300px;" src="{{asset('storage/'.$produit->photo)}}" alt="{{$produit->name}}">
                                    <div class="review">Average rate overview</div><input data-showcaption=false disabled id="{{$produit->id}}" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{$produit->average_rating}}"  data-size="s">
                                    <!-- Hover Thumb -->
                                    <!-- <img class="hover-img" src="img/product-img/product2.jpg" alt=""> -->
                                </div>

                                <!-- Product Description -->
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price">${{ $produit->price }}</p>
                                        <a href="{{ route('Produit.show', $produit->id) }}">
                                            <h6>{{ $produit->name }}</h6>
                                        </a>
                                    </div>
                                    <!-- Ratings & Cart -->
                                    <div class="ratings-cart text-right">
                                        <div class="ratings">
                                        
                                        </div>
                                        <div class="cart">
                                            <form action="{{route('panier.store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="qtt"  value="1">
                                                <input type="hidden" name="prod_id"  value="{{$produit->id}}">
                                                <button class="btn" type="submit" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{asset('img/core-img/cart.png')}}" alt=""></button>
                                            </form>
                                        </div>
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
                            {{ $produits->appends($_GET)->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')
    <script>
        
        if('{{$paginator}}')
            document.getElementById('{{$paginator}}').setAttribute("selected","");
       
        function update(){
            var btn = document.getElementById('bouton');
            btn.click();
        }
        function updateCategorie(categorie){
            document.getElementById('categorie').value=categorie;
            update();
        }
        function updatePrice(priceRange){
           var price;
           var min = '';
           var max = '';
           var test = false;
            for(var i=0 ; i<priceRange.length ; i++){
                if(priceRange[i] == ' '){
                    test = true;
                }
                if(priceRange[i] != '$' && test == false){
                    min += priceRange[i];
                }
                if(test == true && priceRange[i] != '$' && priceRange[i] != ' ' && priceRange[i] != '-'){
                    max += priceRange[i];
                }
            }
            document.getElementById('min').value=min;
            document.getElementById('max').value=max;
            update(); 
        }
    </script>
@endsection