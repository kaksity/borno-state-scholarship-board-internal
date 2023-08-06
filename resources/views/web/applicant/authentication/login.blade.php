@extends('web.applicant.authentication.layout')
@section('title', 'Login')
@section('authentication-component')
<center>
    <img src="assets/images/auth/auth-logo.png" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none" width="120">
    <h3 class="mb-4 f-w-400">Log into your Account</h3>
</center>
@if (session()->has('status'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('process-login') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Email Address</label>
        <div>
            <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="p-1 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="name" class="form-label">Password</label>
        <div>
            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                value="{{ old('password') }}">
            @error('password')
            <div class="p-1 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="custom-control custom-checkbox text-left mb-4 mt-2">
        <input type="checkbox" class="custom-control-input" name="remember_me" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">Remember Me</label>
    </div>
    <button class="btn btn-block btn-primary mb-4" id="submitForm">Log In</button>
</form>
<div class="text-center">
    <p class="mb-2 mt-4 text-muted">Forgot password? <a href="{{ route('show-request-reset-password') }}" class="f-w-400">Reset</a></p>
    <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('show-registration') }}" class="f-w-400">Create
            an account</a></p>
</div>

@endsection
