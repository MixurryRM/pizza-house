@extends('layouts.layout')
@section('content')
<div class="wrapper pizza-details">
     <h1>Order for {{$pizzas->name}}</h1>
     <p class="type">Type - {{ $pizzas->type }} </p>
     <p class="base">Base - {{ $pizzas->base }} </p>
</div>
<a href="/pizzas" class="back"><-Back to all pizzas</a>
@endsection
