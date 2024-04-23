@extends('layouts.layout')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">
                @if (Auth::user()->image == null)
                    <img src="{{ asset('/image/default.webp') }}" alt="Profile Picture"
                        style="width: 200px;height:200px"
                        class="me-3 rounded image-float mb-4" />
                @else
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" style="width: 200px;height: 200px"
                    class="me-3 rounded image-float mb-4" />
                @endif
                <h2>{{ Auth::user()->name }}</h2>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Location: {{ Auth::user()->location }}</p>
                <p>Joined: {{ Auth::user()->created_at->format('F j, Y') }}</p>
                <p>Phone No: {{ Auth::user()->phone }}</p>
                <p>Role: {{ ucFirst(Auth::user()->role) }}</p>
            </div>
        </div>
    </div>
@endsection
