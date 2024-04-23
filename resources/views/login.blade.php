@extends('layouts.layout')

@section('content')
    <div class="container login-body">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <a href="/" class="text-decoration-none text-dark"><i class="fa-solid fa-arrow-left"
                            style="color: #8a65f7;"></i></a>
                    <h2 class="text-center mb-4">Pizza Login</h2>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                id="email" name="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror" placeholder="Password"
                                id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn w-100 text-light" style="background-color: #5e2195">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
