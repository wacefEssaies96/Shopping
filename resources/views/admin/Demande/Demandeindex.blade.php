@extends('layouts.auth')

@section('title')
   All Demands
@endsection

@section('content')

<div class="card-header">
  <h3 class="card-title">All Demands ( {{$NCD['TDEA']+$NCD['TDAC']}} )</h3>
</div>
@if($NCD['TDEA']+$NCD['TDAC']==0)
  <h3 class="text-warning">There are no Demands </h3>
@else
<div class="row">
  <div class="col-md-12">
    <div class="card">

      @if (session('AccepterDemande'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('AccepterDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      @if (session('deleteDemande'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('deleteDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      @if (session('AnnulerDemande'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('AnnulerDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      <div class="card-header">
        <h4 class="card-title">Pending Demands ( {{$NCD['TDEA']}} )</h4>
      </div>
      <div class="card-body">
        @if($NCD['TDEA']==0)
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
              <th colspan="3" >Actions</th>
            </thead>
            <tbody>
            @foreach ($NCD['attenteDemandes'] as $demande)
                <tr>
                  <th scope="row"><?=$counter++;?></th>
                  <td>{{$demande->id_prod}}</td>
                  <td>{{$demande->id_user}}</td>
                  <td>{{$demande->status}}</td>
                  <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                  <td>
                      <a href="{{ route('ConsulterDetailleDemandes',['prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-primary">
                        Show
                      </a>
                  </td>
                  <td>
                      <a href="{{ route('AccepterDemande',['id' =>  $demande->id,'prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-success">
                        Accept
                      </a>
                  </td>
                  <td>
                  
                    <a href="#" id="d" onClick="d('{{$demande['id']}}');" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">
                      Refuse
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
              <th colspan="3">Actions</th>
            </thead>
            <tbody>
            @foreach ($NCD['accepteeDemandes'] as $demande)
                <tr>
                  <th scope="row"><?=$counter++;?></th>
                  <td>{{$demande->id_prod}}</td>
                  <td>{{$demande->id_user}}</td>
                  <td>{{$demande->status}}</td>
                  <td>{{date('d-m-Y h:i', strtotime($demande->created_at))}}</td>
                  <td>
                  <td>
                      <a href="{{ route('ConsulterDetailleDemandes',['prodid' =>  $demande->id_prod,'userid' => $demande->id_user ]) }}" class="btn btn-primary">
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
      </div>
    </div>
  </div>
</div>
@endif
<script>

    function d(id){
        document.getElementById('input').value = id;
    }
</script>                                       
<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Demand </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Are you sure to delete this Demand ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#delete-Demand-form').submit();">Confirm </button>
        </div>
        <form id="delete-Demand-form" action="{{ route('deleteDemande') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input name="id" id="input" type="hidden" value="">
            <button style="display:none;" id="button" type="submit"></button>
        </form>
    </div>
    </div>
</div>
@endsection