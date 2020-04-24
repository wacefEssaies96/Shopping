@extends('layouts.app')
@section('content')

    {{$panier->id}}
    <a class="btn btn-outline-success" href="{{route('panier.edit',$panier->id)}}">Edit</a>
    <a class="btn btn-outline-danger" href="#" onclick="event.preventDefault();document.querySelector('#delete-panier-form').submit();">Supprimer</a>
    <form id="delete-panier-form" method="post" action="{{route('panier.destroy',$panier->id)}}" style="display:none;">
        @csrf
        @method('DELETE')
    </form>



@endsection