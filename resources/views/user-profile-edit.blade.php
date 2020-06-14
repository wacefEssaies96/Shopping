 @extends('layouts.auth')
 <title>
    Profile
 </title>
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
      <h3>Upate Profile</h3>
    </div>
    <div class="card-body">
      <form action="/profil/update" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                    </div>
                    <div class="col-6 form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Address</label>
                        <input type="text" name="adresse" value="{{$user->adresse}}" class="form-control">
                    </div>
                    <div class="col-6 form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @if ($user->image != null && $user->image !='')
                <img class="img-fluid" style="max-width:150px;" src="{{asset('images/'.$user->image)}}" onerror="this.style.display='none'" >
                @endif
                <div class="file btn btn-lg btn-default" style="position:relative; overflow:hidden;font-size:15px;">
                    Change
                    <input type="file" name="image" style="position:absolute; opacity:0; top:0;right:0;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-danger"><i>Only if you want to change your password !</i></div>
            <div class="col-6 form-group">
                <label>Password</label>
                <input type="password" name="password1" value="" class="form-control">
            </div>
            <div class="col-6 form-group">
                <label>
                    Retype password</label>
                <input type="password" name="password2" value="" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href type="/home" class="btn btn-danger">Cancel</a>
        <a href="/profil/disable" class="btn btn-primary float-right">deactivate</a>
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
