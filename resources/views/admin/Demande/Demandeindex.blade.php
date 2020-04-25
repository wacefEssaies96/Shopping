@extends('layouts.master')

@section('title')
   Admin
@endsection

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Demandes en attentes</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>id produit</th>
              <th>User ID</th>
              <th>Date</th>
              <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($attenteDemandes as $demande)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$demande->prod_id}}</td>
                <td>{{$demande->user_id}}</td>
                <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                <td><a href="#" class="btn btn-success">Accepter</a></td>
                <td><a href="#" class="btn btn-danger">Refuser</a></td>
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
        <h4 class="card-title">Demandes acceptées</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>id produit</th>
              <th>User ID</th>
              <th>Date</th>
              <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($accepteeDemandes as $demande)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$demande->prod_id}}</td>
                <td>{{$demande->user_id}}</td>
                <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                <td><a href="#" class="btn btn-danger">Supprimer</a></td>
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
