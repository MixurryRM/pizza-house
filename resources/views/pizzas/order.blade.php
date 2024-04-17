@extends('layouts.layout')
@section('content')
    <div class="wrapper create-pizza">
        @if (session('message'))
            <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="14" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        <a href="#" onclick="history.back(); return false;" class="text-decoration-none pizza-color"><i
                class="fa-solid fa-arrow-left"></i></a>

        <h1>Order New Pizza</h1>

        <form action="{{ route('pizzas.store') }}" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
            <input type="hidden" name="user_id" id="order_id" value="{{ Auth::user()->id }}">
            <input type="text" value="{{ Auth::user()->name }}" disabled>

            <label for="type">Choose type of pizza:</label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                @endforeach
            </select>

            <label for="base">Choose Base:</label>
            <select name="base" id="base">
                @foreach ($bases as $base)
                    <option value="{{ $base->name }}">{{ ucfirst($base->name) }}</option>
                @endforeach
            </select>

            <fieldset>
                <label>Extra toppings</label>
                @foreach ($toppings as $topping)
                    <input type="checkbox" name="toppings[]" value="{{ $topping->name }}"> {{ ucfirst($topping->name) }}
                    <br>
                @endforeach
            </fieldset>
            <input type="submit" class="btn w-125 text-light" style="background-color: #5e2195" value="Order Pizza">
        </form>
    </div>
@endsection
