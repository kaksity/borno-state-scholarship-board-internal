@extends('web.applicant.authentication.layout')
@section('title', 'Registration')
@section('authentication-component')
<center>
    <img src="assets/images/auth/auth-logo.png" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none" width="120">
    <h4 class="mb-3 f-w-400">Create an Account</h4>
</center>
@if (session()->has('status'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('status') }}
</div>
@endif

<form action="{{ route('applicant.registration.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Surname</label>
        <div>
            <input type="text" class="form-control" value="{{ old('surname') }}" placeholder="Surname" name="surname">
            @error('surname')
            <div class="p-1 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Other Names</label>
        <div>
            <input type="text" class="form-control" placeholder="Other Names" name="other_names"
                value="{{ old('other_names') }}">
            @error('other_names')
            <div class="p-1 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
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
    <div class="form-group mb-4">
        <label for="name" class="form-label">Confirm Password</label>
        <div>
            <input type="password" class="form-control" placeholder="Comfirm Password"
            value="{{ old('password_confirmation') }}" name="password_confirmation">
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Programme</label>
        <div>
            <select class="js-example-basic-single form-control" name="programme">
                <option value="">Select Programme</option>
                <option value="Undergraduate" @if (old('programme')=='Undergraduate' ) selected @endif>
                    Undergraduate</option>
                <option value="Diploma" @if (old('programme')=='Diploma' ) selected @endif>
                    Diploma
                </option>
                <option value="NCE" @if (old('programme')=='Diploma' ) selected @endif>
                    National Certificate Examination
                </option>
                <option value="HND" @if (old('programme')=='HND' ) selected @endif>
                    Higher National Diploma
                </option>
                <option value="Nursing" @if (old('programme')=='Nursing' ) selected @endif>
                    College of Nursing
                </option>
            </select>
            @error('programme')
            <div class="p-1 text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <button class="btn btn-primary btn-block mb-4" id="submitForm">Create an Account</button>
</form>
<div class="text-center">
    <p class="mb-2 mt-4 text-muted">Forgot password? <a href="{{ route('applicant.reset-password.index') }}" class="f-w-400">Reset</a></p>
    <p class="mt-4">Already have an account? <a href="{{ route('applicant.login.index') }}" class="f-w-400">Log into your
            account</a></p>
</div>
@endsection
