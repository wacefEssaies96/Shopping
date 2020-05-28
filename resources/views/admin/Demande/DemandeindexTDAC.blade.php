@extends('layouts.auth')

@section('title')
  Accepted demands
@endsection

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
      @if (session('AnnulerDemande'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('AnnulerDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
        </div>
      @endif
      <div class="card-header">
        <h4 class="card-title">Accepted Demands ( {{$NCD['TDAC']}} )</h4>
      </div>
      <div class="card-body">
        @if($NCD['TDAC']==0)
          <h3 class="text-warning">There are no demands</h3>
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
              <th  colspan="3">Actions</th>
            </thead>
            <tbody>
            @foreach ($accepteeDemandes as $demande)
                <tr>
                  <th scope="row"><?=$counter++;?></th>
                  <td>{{$demande->id_prod}}</td>
                  <td>{{$demande->id_user}}</td>
                  <td>{{$demande->status}}</td>
                  <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                  <td>
                  <td>
                      <a href="{{ route('ConsulterDetailleProduit',['prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-primary">
                        Show
                      </a>
                  </td>
                  <td>
                      <a href="{{ route('AnnulerDemande',['id' =>  $demande->id,'prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-danger">
                        Cancel
                      </a>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        @endif
        {{ $accepteeDemandes->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
