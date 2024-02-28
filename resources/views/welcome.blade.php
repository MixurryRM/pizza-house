@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <div class="d-flex">
                        <div>
                            <a href="{{ url('/home') }}">Home</a>
                        </div>
                        <div>
                            <form class="inline" action="auth/logout" method="POST">
                                @csrf
                                <button type="submit">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ url('auth/login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ url('auth/register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            @if (session('login'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('login') }}
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

            <a href="/pizzas/create">Order a pizza...</a>
        </div>
    </div>
@endsection
