@extends('layouts.layout')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4 pb-4 pizza-color fst-italic"><span class="text-muted"><i
                    class="fas fa-star text-warning"></i></span>Customer Reviews
            <span class="text-muted"><i class="fas fa-star text-warning"></i></span>
        </h1>
        @if (count($reviews) != 0)
            <div class="row">
                @foreach ($reviews as $review)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <a class="btn-close float-end" href="{{ route('reviews.delete', $review->id) }}"></a>
                                <h5 class="card-title fst-italic" style="color: #5e2195;">{{ $review->name }}</h5>
                                <p class="card-text">"{{ $review->review }}"</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-3 text-center w-50 form-control text-light" style="margin: 0 auto;background-color: #974dd8">
                There is no reviews yet!
            </div>
        @endif
        <div class="mt-3">
            <p>{{ $reviews->links() }}</p>
        </div>
    </div>
@endsection
