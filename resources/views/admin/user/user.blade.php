@extends('layouts.auth')
 
@section('title')
  User
@endsection

@section('content')
@include('message.alert')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Users</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php $counter = 1?>
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Actions</th>
              
            </thead>
            <tbody>
            @foreach ($users as $user)
              <tr>
                <th scope="row"><?=$counter++;?></th>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->adresse}}</td>
                <td>{{$user->phone}}</td>
                <td>
                @if($user->role!='admin')
                <a href="/user-edit/{{$user->id}}" class="btn btn-success">Edit</a>
                <a href="/admin/user/{{$user->etat==1?'disable/' . $user->id : 'enable/' . $user->id}}" class="btn btn-{{$user->etat==1?'primary':'default'}}">{{$user->etat==1?'Désactiver':'Activer'}}</a>
                <form action="/user-delete/{{$user->id}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-danger delete">Delete</button>
                  </form>
                @endif
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