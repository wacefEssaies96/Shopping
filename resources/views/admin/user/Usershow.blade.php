@extends('layouts.auth')

@section('title')
   Details of order
@endsection

@section('content')


<div class="row text-center">

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">User Informations <img class="img-profile rounded-circle "  src="{{asset('images/'.$user->image)}}" onerror="this.style.display='none'"></h4>
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
                        <th>Address</th>
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
        