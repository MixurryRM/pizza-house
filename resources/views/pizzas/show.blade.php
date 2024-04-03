@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-details">
        <h1>Order for {{ $pizzas->name }}</h1>
        <p class="type">Type - {{ $pizzas->type }}</p>
        <p class="base">Base - {{ $pizzas->base }}</p>
        <p class="toppings">Extra toppings:</p>
        <ul>
            @foreach ($pizzas->toppings as $topping)
                <li>{{ $topping }}</li>
            @endforeach
        </ul>
        <a href="{{ route('pizzas.destory', $pizzas->id) }}">
            <button type="submit" class="btn w-25 text-light" style="background-color: #5e2195">Complete Order</button>
        </a>
    </div>
    <a href="{{ route('pizzas.index') }}" class="back text-decoration-none"><- Back to all pizzas</a>
@endsection
