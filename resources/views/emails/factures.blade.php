@component('mail::message')
# Facture
|      Name     |         Price        |    Quantity    |      Description      |
|---------------|:--------------------:|:--------------:|-----------------------|
@foreach($commande as $item)
|{{$item->name}}|   {{$item->price}} $  |   {{$item->quantity_prod}}    |  {{$item->description}}  |
@endforeach
   
##Total : {{$somme}} $
Thanks for your purchase,<br>
{{ config('app.name') }}
@endcomponent
