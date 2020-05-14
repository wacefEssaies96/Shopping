@extends('layouts.app')

@section('content')

@include('layouts.searchWrapper')

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        @include('layouts.navgauche')
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix " >
            <div class="amado-pro-catagory clearfix">
            @foreach ($produit  as $prod)
                @if($prod->confirm)
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="shop.html">
                        <img style="height:350px;" src="{{ asset('storage/'.$prod['photo']) }}" alt="{{$prod['name']}}">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>${{$prod['price']}}</p>
                            <h4 >{{$prod['name']}}</h4>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')   

@endsection
