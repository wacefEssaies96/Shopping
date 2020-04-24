@extends('layouts.master')

@section('title')
   Admin
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Commandes en attentes</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>id produit</th>
              <th>User ID</th>
              <th>Quantité</th>
              <th>Livraison</th>
              <th>Date</th>
              <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($attenteCommandes as $commande)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$commande->prod_id}}</td>
                <td>{{$commande->user_id}}</td>
                <td>{{$commande->quantity_prod}}</td>
                <td>{{$commande->livraison==1?"Livré":"Non livré"}}</td>
                <td>{{date('d-m-Y h:i', strtotime($commande->created_at))}}</td>
                <td><a href="/commande/accept/{{$commande->id}}" class="btn btn-success">Accepter</a></td>
                <td><a href="/commande/refuse/{{$commande->id}}" class="btn btn-danger">Refuser</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Commandes acceptées</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>id produit</th>
              <th>User ID</th>
              <th>Quantité</th>
              <th>Livraison</th>
              <th>Date</th>
              <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($accepteeCommandes as $commande)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$commande->prod_id}}</td>
                <td>{{$commande->user_id}}</td>
                <td>{{$commande->quantity_prod}}</td>
                <td>{{$commande->livraison==1?"Livré":"Non livré"}}</td>
                <td>{{date('d-m-Y h:i', strtotime($commande->created_at))}}</td>
                <td><a href="/commande/delete/{{$commande->id}}" class="btn btn-danger">Supprimer</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection