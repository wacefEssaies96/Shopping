@extends('layouts.auth')

@section('title')
   Detaille de demande
@endsection

@section('content')


<div class="row text-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Product Informations</h4>
      </div>
      <div class="card-body" >
        <div class="table-responsive"> 
            <!--  Product information -->
            <div class="col-12 col-lg-12">
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th>ProdID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>quantity</th>
                    </thead>
                    <tbody>
                        <tr>
                        <th>{{ $Produit->id }}</th>
                        <th>{{ $Produit->name }}</th>
                        <th>{{ $Produit->price }}</th>
                        <th>{{ $Produit->quantity }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th>categorie</th>
                        <th>Description </th>
                    </thead>
                    <tbody>
                        <th>{{ $Produit->categorie }}</th>
                        <th> {{ $Produit->description }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th>created at</th>
                        <th>updated at</th>
                        <th>date d envoi</th>
                    </thead>
                    <tbody>
                        <tr>
                        <th>{{ date('d-m-Y h:i', strtotime($Produit->created_at)) }}</th>
                        <th>{{ date('d-m-Y h:i', strtotime($Produit->updated_at)) }}</th>
                        <th>{{ date('d-m-Y h:i', strtotime($Produit->DtEnvoyerD)) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End  Product information -->
        </div>
          
        <!-- Pictures -->
                   
        <div class="main-content-wrapper d-flex clearfix justify-content-center" >
            <div class="single-product-area section-padding-100 clearfix">
                    <h3 class="text-center">Product Pictures</h3>
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel" >
                        
                            <ol class="carousel-indicators scoller"  >
                                @if($total != 0)
                                    * {{$counter = 1}} *
                                    <li class="active" data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                    </li>
                                    @foreach ($ImageProduit as $imgprod)  
                                        *{{$counter+=1}}*
                                        <li data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$imgprod['image']) }});">
                                        </li>
                                    @endforeach  
                                @endif
                            </ol>
                            <div class="carousel-inner" >
                                <div class="carousel-item active" >
                                    <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                        <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="ID img prod  {{$Produit['id']}}">
                                    </a>
                                </div>
                                
                                @if($total != 0)
                                    @foreach ($ImageProduit as $imgprod)
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="{{ asset('storage/'.$imgprod['image']) }}">
                                                <img class="d-block w-100" src="{{ asset('storage/'.$imgprod['image']) }}" alt="ID img prod {{$imgprod['id']}}">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pictures -->
     </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">User Informations <img class="img-profile rounded-circle " src="{{asset('storage/'.$user->image)}}" alt="{{ asset('login_register/logi.png') }}"></h4>
      </div>
      <div class="card-body" >
        <div class="table-responsive"> 
            <!--  User  information -->
            <div class="col-12 col-lg-12">
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th>UserID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                        <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->role }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead class=" text-primary">
                        <th>Adress</th>
                        <th>Phone</th>
                        <th>Account</th>
                    </thead>
                    <tbody>
                        <tr>
                        <th>{{ $user->adresse }}</th>
                        <th>{{ $user->phone }}</th>
                        <th>
                            @if($user->etat)
                             active
                            @else
                             Not active
                            @endif
                        </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End  User  information -->
        </div>
                    
        </div>
    </div>
  </div>

</div>
        
@endsection
        