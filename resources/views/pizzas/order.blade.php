@extends('layouts.layout')
@section('content')
    <div class="wrapper create-pizza">
        <a href="#" onclick="history.back(); return false;" class="text-decoration-none pizza-color"><i
                class="fa-solid fa-arrow-left"></i></a>

        <h1>Order New Pizza</h1>

        <form action="/pizzas" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">

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
                <label>Extra toppings</label> <br>
                @foreach ($toppings as $topping)
                <input type="checkbox" name="toppings[]" value="{{ $topping->name }}"> {{ ucfirst($topping->name) }} <br>
                @endforeach
            </fieldset>
            <input type="submit" value="Order Pizza">
        </form>
    </div>
@endsection
