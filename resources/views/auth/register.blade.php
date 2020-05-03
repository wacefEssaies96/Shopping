@extends('layouts.auth')


@section('title' , "Register")

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block "><!--bg-register-image-->
                <img src="{{ asset('login_register/regs.jpg') }}"  alt="check path " style="height:100%;width:100%;"/>
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}<!--Create an Account!--></h1>
                </div>
                <form method="POST" action="{{ route('register') }}" class="user">
                    @csrf

                    <div class="form-group ">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div >
                            <input id="name" type="text" placeholder="Name" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div >
                            <input id="email" type="email" placeholder="Email Address" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        
                        <div class="col-md-6">
                            <input id="adresse" type="text" placeholder="Your Address" class="form-control form-control-user @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input id="phone" type="tel" placeholder="Your phone number Format: 12345678 " pattern="[0-9]{8}" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div >
                            <input id="password" type="password" placeholder="Password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div >
                            <input id="password-confirm" type="password" placeholder="Repeat Password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div >
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div >
                        @if (Route::has('login'))
                            <a class="btn btn-link" href="{{ route('login') }}">
                            Already have an account?  {{ __('Login') }}
                            </a>
                        @endif
                    </div>
                        <!--
                    <form >

                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                        Register Account
                        </a>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>

                    <hr> -->
                    <a class="fa fa-home fa-dark fa-lg float-right" href="{{ url('/') }}">Home</a>
                </form>

            </div>
        </div>
      </div>
    </div>
@endsection
