 @extends('layouts.auth')
 
@section('content')

    @client
      @include('layouts.nav')
    @endclient
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        @client
            @include('layouts.navgauche')
        @endclient
        <!-- Product Catagories Area Start -->
<div class="m-auto" style="max-width:800px;">
  <div class="card">
    <div class="card-header">
      <h3>Mise à jour du profil</h3>
    </div>
    <div class="card-body">
      <form action="/profil/update" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-md-9">
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
            </div>
            <div class="col-md-3">
                @if ($user->image != null && $user->image !='')
                <img class="img-fluid" style="max-width:150px;" src="{{asset('images/'.$user->image)}}" onerror="this.style.display='none'" >
                @endif
                <div class="file btn btn-lg btn-default" style="position:relative; overflow:hidden;font-size:15px;">
                    Changer
                    <input type="file" name="image" style="position:absolute; opacity:0; top:0;right:0;">
                </div>
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
    @client
    @include('layouts.footer')   
    @endclient
@endsection
