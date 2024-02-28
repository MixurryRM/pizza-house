@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if (session('login'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('login') }}
                    </p>
                </div>
            @endif
            @if (session('logout'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('logout') }}
                    </p>
                </div>
            @endif
            @if (session('register'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('register') }}
                    </p>
                </div>
            @endif
            <img src="/image/pizza-house.png" alt="pizza house logo">
            <div class="title m-b-md">
                The East's Best Pizzas
            </div>
            @if (session('message'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-success">
                        {{ session('message') }}
                    </p>
                </div>
            @endif

            @if (auth()->user() != null)
                <a href="{{ route('pizzas.index') }}" class="pizza-color text-decoration-none me-3">Manage Order</a>
            @else
                <a href="{{ route('pizzas.create') }}" class="pizza-color text-decoration-none me-3">Order a pizza ...</a>
            @endif

        </div>
    </div>
@endsection
