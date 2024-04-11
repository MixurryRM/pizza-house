@extends('layouts.layout')
@section('content')
    <div class="wrapper pizza-index">
        @if (session('order'))
            <div x-data='{show : true}' x-init='setTimeout(() => show = false, 2000)' x-show='show'
                class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                        <use xlink:href="#info-fill" />
                    </svg>
                    <strong>{{ session('order') }}</strong>
                </div>
            </div>
        @endif
        <h1 class="pizza-color">Pizza Orders</h1>

        @if (count($pizzas) != 0)
            @foreach ($pizzas as $pizza)
                <div class="pizza-item">
                    <img src="/image/pizza.png" alt="pizza icon">
                    <h4><a href="{{ route('pizzas.show', $pizza->id) }}">{{ $pizza->name }}</a></h4>
                </div>
            @endforeach
            <div class="">
                <p>{{ $pizzas->links() }}</p>
            </div>
        @else
            <div class="p-3 text-center w-50 form-control text-light mb-5" style="margin: 0 auto;background-color: #974dd8">
                There is no order yet!
            </div>
        @endif

    </div>
@endsection
