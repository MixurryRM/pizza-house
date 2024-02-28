@extends('layouts.layout')

@section('content')
    <div class="container login-body ">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <a href="#" onclick="history.back(); return false;" class="text-decoration-none text-dark"><i
                            class="fa-solid fa-arrow-left" style="color: #8a65f7;"></i></a>
                    <h2 class="text-center mb-4">Pizza Login</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
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
