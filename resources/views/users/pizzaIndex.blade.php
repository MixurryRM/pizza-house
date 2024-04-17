@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        <h1 class="pizza-color">Pizza Orders</h1>

        @if (count($usersWithOrders) != 0)
            @foreach ($usersWithOrders as $pizza)
                <div class="pizza-item">
                    <img src="/image/pizza.png" alt="pizza icon">
                    <h4><a href="{{ route('pizzas.show', $pizza->id) }}">{{ $pizza->name }}</a></h4>
                </div>
            @endforeach
            <div class="">
                <p>{{ $usersWithOrders->links() }}</p>
            </div>
        @else
            <div class="p-3 text-center w-50 form-control text-light mb-5" style="margin: 0 auto;background-color: #974dd8">
                There is no order yet!
            </div>
        @endif
    </div>
@endsection
