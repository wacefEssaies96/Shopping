@extends('layouts.auth')

@section('title')
  edit-user
@endsection

@section('content')
@include('message.alert')
<div class="m-auto" style="max-width:500px;">
  <div class="card">
    <div class="card-header">
      <h3>Modifier les roles des utilisateurs</h3>
    </div>
    <div class="card-body">
      <form action="/role-user-update/{{$users->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
          <label>User-Name</label>
          <input type="text" name="name" value="{{$users->name}}" class="form-control">
        </div>
        <div class="form-group">
          <label>Role-user</label>
          <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="client">Client(e)</option>
            <option value="admin-entreprise">admin-entreprise</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success">Mise a jour </button>
        <a href type="/admin/user" class="btn btn-danger">Annuler </a>
      </form>
    </div>
  </div><!--CARD END-->
</div>


@endsection

@section('scripts')

@endsection