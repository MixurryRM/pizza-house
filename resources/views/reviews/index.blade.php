@extends('layouts.layout')
@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4 pb-4 pizza-color fst-italic"><span class="text-muted"><i
                    class="fas fa-star text-warning"></i></span>Reviews Us
            <span class="text-muted"><i class="fas fa-star text-warning"></i></span>
        </h1>
        <div class="text-center w-100">
            @if (session('message'))
                <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-laravel text-white px-28 py-3 w-50"
                    style="margin-left: 24rem">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <strong>
                            {{ session('message') }}
                        </strong>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-7">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form class="pizza-color" action="{{ route('reviews.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="review">Your Reviews</label>
                                <textarea
                                    class="form-control @error('review')
                                    is-invalid
                                @enderror"
                                    name="review" rows="5" placeholder="Enter your review" required></textarea>
                                @error('review')
                                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn w-125 text-light"
                                style="background-color: #5e2195">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <img src="image/undraw_reviews_lp8w.svg" class="w-100 mt-5">
            </div>
        </div>
    </div>
@endsection
