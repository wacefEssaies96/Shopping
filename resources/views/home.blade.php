@extends('layouts.app')

@section('content')


    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="{{ asset('img/core-img/search.png') }}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        @include('layouts.navgauche')

        <!-- Product Catagories Area Start -->
        <div class="container products-catagories-area clearfix " ><!---->
            <div class="row amado-pro-catagory clearfix"><!---->
            
            @foreach ($produit  as $prod)
            <!-- <form action="{{route('panier.store')}}" method="post"> -->
            
                @if($prod->confirm)
                    @csrf
                    <!-- Single Catagory -->
                    <div class="col-sm-4 "><!--class=""-->
                        <a href="#">
                            <img src="{{ asset('img/image_projet/'.$prod['photo']) }}"  alt="check path " style="height:300px"/>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>${{$prod['price']}}</p>
                                <h4>
                                    <a href="{{ route('Produit.show', $prod->id) }}">
                                        {{$prod['name']}}
                                    </a>
                                </h4>
                            </div>
                        </a>
                    </div>
                @endif
            <!-- </form> -->
            @endforeach
                
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')   

@endsection
