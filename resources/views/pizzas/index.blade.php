@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        <div class="content">
            @if (session('complete'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('complete') }}
                    </p>
                </div>
            @endif
            <div class="title m-b-md">
                Pizzas Order List
            </div>

            @if (count($pizzas) == 0)
                There is no pizza list!
            @else
                @foreach ($pizzas as $pizza)
                    <div class="pizza-item w-75 ms-5">
                        <img src="/image/pizza.png" alt="pizza icon" class="mr-5 p-1">
                        <a href="/pizzas/{{ $pizza->id }}" class="text-decoration-none text-dark">{{ $pizza->name }} - {{ $pizza->type }} - {{ $pizza->base }}</a>
                        <a href="/pizzas/{{ $pizza->id }}/delete">
                            <button class="btn btn-sm me-1" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </button>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
