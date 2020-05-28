@extends('layouts.app')
@section('title', 'Checkout')
@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
    @include('layouts.searchWrapper')
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        @include('layouts.navgauche')
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <!-- <form action="#" method="post"> -->
                            <form id="payment-form">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="first_name" value="" placeholder="First Name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="last_name" value="" placeholder="Last Name" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" id="company" placeholder="Company Name" value="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <select class="w-100" id="country">
                                            <option value="usa">United States</option>
                                            <option value="uk">United Kingdom</option>
                                            <option value="ger">Germany</option>
                                            <option value="fra">France</option>
                                            <option value="ind">India</option>
                                            <option value="aus">Australia</option>
                                            <option value="bra">Brazil</option>
                                            <option value="cana">Canada</option>
                                        </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control mb-3" id="street_address" placeholder="Address" value="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" id="city" placeholder="Town" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea name="comment" class="form-control w-100"  cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox d-block mb-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                            </div>
                                            <div class="custom-control custom-checkbox d-block">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                                <ul class="summary-table">
                                    <li><span>subtotal:</span> <span id="subTotal">${{$total}}</span></li>
                                    <li><span>delivery:</span> <span>$10</span></li>
                                    <li><span>Taxe:</span> <span>15%</span></li>
                                    <li><span>total:</span> <span id="total">${{$total*1.15+10}}</span></li>
                                </ul>

                            <!--<div class="payment-method">
                               
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                              
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="{{asset('img/core-img/paypal.png')}}" alt=""></label>
                                </div>
                            </div> -->
                            
                            <div class="cart-btn mt-100">
                                
                                    <div id="card-element">
                                        <!-- Elements will create input elements here -->
                                    </div>

                                    <!-- We'll put the error messages in this element -->
                                    <div id="card-errors" role="alert"></div>

                                    <button id="submit" class="btn amado-btn w-100 mt-5">Pay</button>
                                </form>
                                <form action="{{ route('commande.store') }}" method="post">
                                    @csrf
                                    <button type="submit" id="d" style="display:none;" ></button>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')
@endsection
@section('extra-js')
    <script>
        var stripe = Stripe('pk_test_bW5RxkvZZXICDF5mD7chnLCt00lSi1u4zH');	
        var elements = stripe.elements();
        var style = {
            base: {
            color: "#32325d",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
            },
            invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
            }
        };
        var card = elements.create("card", { style: style });
        card.mount("#card-element");
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: "{{ $nameClient }}"
                    }
                }
            }).then(function(result) {
                if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
                } else {
                // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                        //console.log(result.paymentIntent);
                        document.getElementById('d').click();
                    }
                }
            });
        });
    </script>
@endsection
