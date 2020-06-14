<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="{{ url('/') }}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a><!--index.html-->
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="{{ url('/') }}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a><!--index.html-->
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul >
            <!-- <li >
                <a id="home" href="{{ url('/') }}">Home</a>
            </li> -->
            @admin 
                <li>
                    <a id="home_admin" href="indexnotification" >Home Admin</a>
                </li>
            @endadmin
            @client
                <li><a id="shop" href="{{ route('shop') }}">Shop</a></li>
                <li>
                    <a id="products" href="{{ route('Produit.index') }}" >My Products</a>
                </li>
                <li><a id="cart" href="{{route('panier.index')}}">Cart</a></li>
                
            @endclient
        </ul>
        
    </nav>
    <!-- Button Group ->
    <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div> -->
    <!-- Cart Menu  -->
    <div class="cart-fav-search mb-100">
        <!-- <a href="#" class="cart-nav"><img src="{{ asset('img/core-img/cart.png') }}" alt=""> Cart <span>(0)</span></a>
        <a href="#" class="fav-nav"><img src="{{ asset('img/core-img/favorites.png') }}" alt=""> Favourite</a> -->
        <a href="#" class="search-nav"><img src="{{ asset('img/core-img/search.png') }}" alt=""> Search</a>
    </div>
    <!-- Social Button  -->
    <!-- <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>  -->
</header>
<!-- Header Area End -->
