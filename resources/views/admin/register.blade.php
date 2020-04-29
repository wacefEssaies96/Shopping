@extends('layouts.master')

@section('title')
  Admin
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Les users</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>name</th>
              <th>email</th>
              <th>role</th>
              <th>adresse</th>
              <th>phone</th>
              
            </thead>
            <tbody>
            @foreach ($users as $user)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->adresse</td>
                <td>{{$user->phone}}</td>
                <td><a href="#" class="btn btn-success">Désactiver</a></td>
                <td><a href="#" class="btn btn-danger delete">Supprimer</a>
                       
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection