@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
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
