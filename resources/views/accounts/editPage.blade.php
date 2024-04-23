@extends('layouts.layout')

@section('content')
    <div class="container login-body mb-1">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('message'))
                    <div x-data='{show : true}' x-init='setTimeout(() => show = false, 3000)' x-show='show'
                        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-28 py-3">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="14" height="24" role="img"
                                aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="login-container">
                    <h2 class="text-center mb-4">Account Info</h2>
                    <form method="POST" action="{{ route('accounts.update', Auth::user()->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 d-flex">
                            <div class="">
                                @if (Auth::user()->image == null)
                                    <img src="{{ asset('image/default.webp') }}" alt="" srcset=""
                                        style="width: 100px;height: 100px" class="me-3 rounded image-float">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt=""
                                        style="width: 100px;height: 100px" class="me-3 rounded image-float">
                                @endif
                            </div>
                            <div class="mt-5 ms-3">
                                <input type="file" name="image" id="">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', Auth::user()->name) }}" autofocus
                                placeholder="Username">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="09xxxxxxxx">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input id="location" type="location"
                                class="form-control @error('location') is-invalid @enderror" name="location"
                                value="{{ old('location', Auth::user()->location) }}" placeholder="Location">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn w-100 text-light mt-2"
                            style="background-color: #5e2195">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
