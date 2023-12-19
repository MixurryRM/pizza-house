@extends('layouts.layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <img src="/image/pizza-house.png">
            <div class="title m-b-md">
                The East's Best Pizzas
            </div>

            @if ($pizzas['price'] > 50)
                <h1>This pizza is expensive</h1>
            @else
                @foreach ($pizzas as $pizza)
                    <ul>
                        <li>{{$pizza}}</li>
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
@endsection
