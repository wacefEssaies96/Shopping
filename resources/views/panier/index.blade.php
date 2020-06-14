@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    @include('layouts.searchWrapper')
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        @include('layouts.navgauche')
        @if($total == 0)
            <h3 class="text-warning">Your cart is empty !</h3>
        @else
            <div class="cart-table-area section-padding-100">
            @if (session('deletePanier'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('deletePanier') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="container-fluid">
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="cart-title mt-50">
                                    <h2>Shopping Cart</h2>
                                </div>
                                <div class="cart-table clearfix">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list_panier as $panier)
                                            <tr>
                                                <td class="cart_product_img">
                                                    <a href="#"><img src="{{asset('storage/'.$panier->photo)}}" alt="{{$panier['name']}}"></a>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <h5>{{$panier->name}}</h5>
                                                </td>
                                                <td class="price">
                                                    <span>${{$panier->price}}</span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <p>Qty</p>
                                                        <div class="quantity">
                                                            <span class="qty-minus" onclick="var effect = document.getElementById({{$panier->id}});
                                                                var qty = effect.value;
                                                                if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ){
                                                                    effect.value--;
                                                                    updateTotal(effect.value,{{$panier->price}},'-');
                                                                }
                                                                return false;
                                                            ">
                                                            <i class="fa fa-minus" aria-hidden="true"></i></span>
                                                            <input type="number" class="qty-text" id='{{$panier->id}}' step="1" min="1" max="{{$panier->quantity}}" name="{{$panier->id}}" value="{{ old('quantity_prod') ?? $panier->quantity_prod }}">
                                                            <span class="qty-plus" onclick="var effect = document.getElementById({{$panier->id}});
                                                                var qty = effect.value;
                                                                if( !isNaN( qty )){ 
                                                                    effect.value++;
                                                                    updateTotal(effect.value,{{$panier->price}},'+');
                                                                }
                                                                return false;
                                                            ">
                                                            <i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        </div>
                                                        <button onClick="d('{{$panier->id}}');" type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button> 
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <script>
                                function d(id){
                                    document.getElementById('input').value = id;
                                    document.getElementById('destroy').click();
                                }
                                function updateTotal(qty,price,op){
                                    var total = document.getElementById("subTotal").innerText;
                                    var dolar = total.substring(1);
                                    var v = Number(dolar);
                                    if(op == '+'){
                                        document.getElementById("subTotal").innerText = '$'+Number(v+price);
                                        document.getElementById("total").innerText = '$'+Math.round((Number(v+price)*1.15+10)*100)/100;
                                    }
                                    if(op == '-'){
                                        document.getElementById("subTotal").innerText = '$'+Number(v-price);
                                        document.getElementById("total").innerText = '$'+Math.round((Number(v-price)*1.15+10)*100)/100;
                                    }
                                }
                            </script>
                            <div class="col-12 col-lg-4">
                                <div class="cart-summary">
                                    <h5>Cart Total</h5>
                                    <ul class="summary-table">
                                        <li><span>subtotal:</span> <span id="subTotal">${{$total}}</span></li>
                                        <li><span>delivery:</span> <span>$10</span></li>
                                        <li><span>Taxe:</span> <span>15%</span></li>
                                        <li><span>total:</span> <span id="total">${{$total*1.15+10}}</span></li>
                                    </ul>
                                    <div class="cart-btn mt-100">
                                        <button type="submit" class="btn amado-btn w-100">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form style="display:none;" action="{{route('d')}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" id="input" name="id" value="" >
            <button style="display:none;" id="destroy" class="btn btn-outline-danger" type="submit">Delete</button>
        </form>
        <!-- ##### Main Content Wrapper End ##### -->
    @endif
    
@endsection
