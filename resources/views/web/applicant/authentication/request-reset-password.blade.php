@extends('web.applicant.authentication.layout')
@section('title', 'Login')
@section('authentication-component')
<center>
    <img src="assets/images/auth/auth-logo.png" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none" width="120">
    <h3 class="mb-4 f-w-400">Reset Password</h3>
</center>
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('error') }}
</div>
@endif
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
</div>
@endif
<form action="{{ route('applicant.reset-password.store') }}" method="POST">
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
    <button class="btn btn-block btn-primary mb-4" id="submitForm">Reset Password</button>
</form>
<div class="text-center">
    
    <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('applicant.registration.index') }}" class="f-w-400">Create
        an account</a></p>
    <p class="mt-4">Already have an account? <a href="{{ route('applicant.login.index') }}" class="f-w-400">Log into your
        account</a></p>
</div>

@endsection
