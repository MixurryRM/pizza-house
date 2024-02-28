@extends('layouts.layout')
@section('content')
<div class="wrapper pizza-details">
     <h1>Order By {{$pizzas->name}}</h1>
     <p class="type">Type - {{ $pizzas->type }} </p>
     <p class="base">Base - {{ $pizzas->base }} </p>
     <p>Extra toppings:</p>
     @foreach ($pizzas->toppings as $topping)
         <ul>
            <li>{{$topping}}</li>
         </ul>
     @endforeach
</div>
<a href="/pizzas" class="back"><-Back to all pizzas</a>
@endsection
