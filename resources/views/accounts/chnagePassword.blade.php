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
                    <h2 class="text-center mb-4">Password Info</h2>
                    <form action="{{ route('account.changePassword' , Auth::user()->id ) }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group mb-4">
                            <input id="cc-pament" name="oldPassword" type="password"
                                class="form-control @if (session('notMatch')) is-invalid @endif @error('oldPassword') is-invalid @enderror"
                                aria-required="true" aria-invalid="false" placeholder="Old Password">
                            @error('oldPassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if (session('notMatch'))
                                <div class="invalid-feedback">{{ session('notMatch') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input id="cc-pament" name="newPassword" type="password"
                                class="form-control @error('newPassword') is-invalid @enderror" aria-required="true"
                                aria-invalid="false" placeholder="New Password">
                            @error('newPassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input id="cc-pament" name="confirmPassword" type="password"
                                class="form-control @error('confirmPassword') is-invalid @enderror" aria-required="true"
                                aria-invalid="false" placeholder="Confirm Password">
                            @error('confirmPassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn w-100 text-light mt-2" style="background-color: #5e2195">
                                <i class="fa-solid fa-key mr-2"></i>
                                <span id="payment-button-amount">Change Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
