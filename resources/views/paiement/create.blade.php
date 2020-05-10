@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <form action="{{route('paiement.store')}}" method="post" style="margin:100px; width:30em;">
        @csrf
        <div class="form-group">  
            <label>Type de la carte bancaire : </label>
            <select name="type_cb" id="type_cb" class="form-control">
                <option value="MasterCard">MasterCard</option>
                <option value="Visa">Visa</option>
                <option value="PayPal">PayPal</option>
            </select>
        </div>
        <div class="form-group"> 
            <label>Numero : </label>
            <input class="form-control" type="text" name="num" id="name" pattern="[0-9]{16}" required>  
        </div>
        <div class="form-group"> 
            <label>Date d'éxpiration : </label>
            <input class="form-control" type="date" name="date" id="date" required>
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
    
</div>
@include('layouts.footer')  
 
@endsection
