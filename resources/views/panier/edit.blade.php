@extends('layouts.app')
@section('content')
    <form action="{{ route('panier.update',$panier->id) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="number" name="quantity_prod" id="quantity_prod" value="{{ old('quantity_prod') ?? $panier->quantity_prod }}">
        <button type="submit">Confimer</button>
    </form>
@endsection