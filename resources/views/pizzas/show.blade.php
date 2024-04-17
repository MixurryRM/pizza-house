@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-details">
        @if (session('order'))
            <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="14" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('order') }}
                    </div>
                </div>
            </div>
        @endif
        <h1>Total orders - {{ $pizzas->total() }}</h1>
        @if (count($pizzas) != 0)
            <div class="">
                <p>{{ $pizzas->links() }}</p>
            </div>
            @foreach ($pizzas as $pizza)
                <div class="wrapper pizza-details">
                    <p class="type">Type - {{ $pizza->type }}</p>
                    <p class="base">Base - {{ $pizza->base }}</p>
                    <p class="toppings">Extra toppings:</p>
                    <ul>
                        @foreach ($pizza->toppings as $topping)
                            <li>{{ $topping }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('pizzas.destory', $pizza->id) }}">
                        <button type="submit" class="btn w-25 text-light" style="background-color: #5e2195">Complete
                            Order</button>
                    </a>
                </div>
            @endforeach
        @else
            <div class="p-3 text-center w-50 form-control text-light mt-5" style="margin: 0 auto;background-color: #974dd8">
                There is no orders yet!
            </div>
        @endif
        <a href="{{ route('users.pizzaIndex') }}" class="back text-decoration-none"><strong><- Back to all
                    pizzas</strong></a>
    @endsection
</div>
