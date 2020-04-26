@extends('layouts.auth')


@section('title' , "Login")

@section('content')
    

<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block "><!--bg-login-image-->
                    <img src="{{ asset('login_register/logi.png') }}"  alt="check path " style="height:100%;width:100%;"/>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="form-group ">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                
                                <div >
                                    <input id="email" type="email" placeholder="Enter Email Address..." class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="password" >{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" placeholder="Password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div >
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register') }}<!--Create an Account!-->
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!--form class="user">
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                            </a>
                            </form>
                            <hr>-->
                            <a class="fa fa-home fa-dark fa-lg float-right" href="{{ url('/') }}">Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

  



   

