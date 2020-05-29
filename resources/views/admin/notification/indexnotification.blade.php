
@extends('layouts.auth')

@section('title')
   All Demands
@endsection

@section('content')

<div class="card-header">
  <h3 class="card-title">All Notifications ( {{$NCD['notification']}} )</h3>
</div>
@if($NCD['notification']==0)
  <h3 class="text-warning">There are no Notifications </h3>
@else

  <input type="hidden" value="{{$con=0}}">
  @foreach ($NCD['Demnotifications'] as $item)
    <input type="hidden" value="{{$con+=1}}">
  @endforeach 

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pending Demands ( {{$con}} )</h4>
        </div>
        <div class="card-body">
          @if($con==0)
            <h3 class="text-warning">There are no demands </h3>
          @else
          <div class="table-responsive">
          <?php $counter = 1?>
            <table class="table text-center">
              <thead class=" text-primary">
                <th>#</th>
                <th>Product ID</th>
                <th>User ID</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
              </thead>
              <tbody>
              @foreach($NCD['Demnotifications'] as $demande)
                  <tr>
                    <th scope="row"><?=$counter++;?></th>
                    <td>{{$demande->id_prod}}</td>
                    <td>{{$demande->id_user}}</td>
                    <td>{{$demande->status}}</td>
                    <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                    <td>
                        <a href="{{ route('ConsulterDetailleProduit',['prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-primary">
                          Show
                        </a>
                    </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pending Orders ( {{$NCD['TCEA']}} )</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <?php $counter = 1?>
            <table class="table text-center">
              <thead class=" text-primary">
                <th>#</th>
                <th>Product ID</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Delivery</th>
                <th>Date</th>
                <th>Actions</th>
              </thead>
              <tbody>
              @foreach ($NCD['attenteCommandes'] as $commande)
                <tr>
                  <th scope="row"><?=$counter++;?></th>
                  <td>{{$commande->prod_id}}</td>
                  <td>{{$commande->user_id}}</td>
                  <td>{{$commande->quantity_prod}}</td>
                  <td>{{$commande->livraison==1?"Livré":"Non livré"}}</td>
                  <td>{{date('d-m-Y h:i', strtotime($commande->created_at))}}</td>
                  <td>
                      <a href="#" class="btn btn-primary">
                      <!-- {{ route('ConsulterDetailleProduit',['prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }} -->
                      Show
                      </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif              
@endsection
