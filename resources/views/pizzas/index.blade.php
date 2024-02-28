@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        @if (session('order'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                    <p class=" text-warning">
                        {{ session('order') }}
                    </p>
                </div>
        @endif
        <h1>Pizza Orders</h1>
        @foreach($pizzas as $pizza)
          <div class="pizza-item">
            <img src="/image/pizza.png" alt="pizza icon">
            <h4><a href="/pizzas/{{ $pizza->id }}">{{ $pizza->name }}</a></h4>
          </div>
        @endforeach

      </div>
@endsection
