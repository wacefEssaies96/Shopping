@extends('layouts.auth')

@section('title')
   Admin
@endsection

@section('content')

@include('message.alert')

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
                <td><a href="/commande/approve/{{$commande->id}}" class="btn btn-success">Accepter</a></td>
                <td><a href="/commande/delete/{{$commande->id}}" class="btn btn-danger delete"
                data-toggle="modal" data-target="#confirmDeletionModal">Refuser</a>
                       
                </td>
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
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<div class="modal fade" id="confirmDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeletionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeletionModalLabel">Annuler Commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          vous êtes sur de supprimer la commande ??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-outline-primary" onclick="event.preventDefault();
                document.querySelector('#delete-commande-form').submit()">Oui Supprimer</button>
      </div>
        <form id="delete-commande-form" action="{{ route('commande.destroy', $commande->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
        </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let buttons =  $(".table .delete");
$.each(buttons, function(index,  button) {
  $(button).on('click', function(e){
    $("#delete-commande-form").attr('action', button.href);
  });
});
console.log("The content", buttons);
</script>
@endsection