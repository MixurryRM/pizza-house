@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if (session('login'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <strong>
                            {{ session('login') }}
                        </strong>
                    </div>
                </div>
            @endif
            @if (session('logout'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Warning:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <strong>
                            {{ session('logout') }}
                        </strong>
                    </div>
                </div>
            @endif
            @if (session('register'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <strong>
                            {{ session('register') }}
                        </strong>
                    </div>
                </div>
            @endif
            <img src="/image/pizza-house.png" alt="pizza house logo">
            <div class="title m-b-md">
                The East's Best Pizzas
            </div>
            @if (auth()->check())
                @if (auth()->user()->role === 'manager')
                    <a href="{{ route('various.createPage') }}" class="text-white form-control text-decoration-none w-25"
                        style="background-color: #5e2195;margin-left: 15rem">Create Pizzas</a>
                @elseif (auth()->user()->role === 'user')
                    <a href="{{ route('pizzas.order') }}" class="text-white form-control text-decoration-none w-25"
                        style="background-color: #5e2195;margin-left: 15rem">Order Pizza</a>
                @endif
            @endif

        </div>
    </div>
@endsection
