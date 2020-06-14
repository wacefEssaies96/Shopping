@extends('layouts.auth')

@section('title')
  Edit User
@endsection

@section('content')
@include('message.alert')
<div class="m-auto" style="max-width:500px;">
  <div class="card">
    <div class="card-header">
      <h3>Change user roles</h3>
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
          <label>User-Role</label><br>
          <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="client">Custmer</option>
          </select>
        </div><br>
        <button type="submit" class="btn btn-success"> Update </button>
        <a href type="/admin/user" class="btn btn-danger"> Cancel </a>
      </form>
    </div>
  </div><!--CARD END-->
</div>


@endsection

@section('scripts')

@endsection