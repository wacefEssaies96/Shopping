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
<div class="m-auto" style="max-width:800px;">
  <div class="card">
    <div class="card-header">
      <h3>Mise à jour du profil</h3>
    </div>
    <div class="card-body">
      <form action="/profil/update" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-6 form-group">
                <label>Nom</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="col-6 form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label>Adresse</label>
                <input type="text" name="adresse" value="{{$user->adresse}}" class="form-control">
            </div>
            <div class="col-6 form-group">
                <label>Téléphone</label>
                <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-danger"><i>Uniquement si vous voulez changer de mot de passe</i></div>
            <div class="col-6 form-group">
                <label>Mot de passe</label>
                <input type="password" name="password1" value="" class="form-control">
            </div>
            <div class="col-6 form-group">
                <label>Retapez mot de passe</label>
                <input type="password" name="password2" value="" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Mise a jour </button>
        <a href type="/home" class="btn btn-danger">Annuler </a>
        <a href="/profil/disable" class="btn btn-primary float-right">Désactiver le compte</a>
      </form>
    </div>
  </div><!--CARD END-->
</div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')   

@endsection
