@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <form action="{{route('paiement.store')}}" method="post" style="margin:100px;">
        @csrf
        <div class="row">  
            <label>Type de la carte bancaire : </label>
            <select name="type_cb" id="type_cb" class="form-control">
                <option value="test1">test1</option>
                <option value="test2">test2</option>
                <option value="test3">test3</option>
            </select>
        </div>
        <div class="row"> 
            <label>Numero : </label>
            <input class="form-control" type="text" name="num" id="name">  
        </div>
        <div class="row"> 
            <label>Date d'éxpiration : </label>
            <input class="form-control" type="date" name="date" id="date">
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
    
</div>
@include('layouts.footer')  
 
@endsection
