@extends('layouts.layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <img src="/image/pizza-house.png">
            <div class="title m-b-md">
                The East's Best Pizzas
            </div>

             @foreach ($pizzas as $pizza)
                 <div>
                    {{$pizza->name}} - {{$pizza->type}} - {{$pizza->base}}
                 </div>
             @endforeach
        </div>
    </div>
@endsection
