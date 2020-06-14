@component('mail::message')
# Facture
|      Name     |         Price        |        Quantity        |
|---------------|----------------------|------------------------|
@foreach($commande as $item)
|{{$item->name}}|   {{$item->price}} $ |{{$item->quantity_prod}}|
@endforeach
   
##Total : {{$somme}} $

Thanks for your purchase,<br>
{{ config('app.name') }}
@endcomponent
