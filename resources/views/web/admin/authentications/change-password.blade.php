@extends('web.admin.layout');

@section('page-content')
<div class="col-xl">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Change Password</h5>
      <small class="text-muted float-end">Update your password</small>
    </div>
    <div class="card-body">
      @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="{{ route('admin.change-password.store') }}" method="post">
        @csrf
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Old Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="old_password"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
          @error('old_password')
          <div class="p-1 text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">New Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="new_password"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
          @error('new_password')
          <div class="p-1 text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Confirm Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="new_password_confirmation"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
          @error('password')
          <div class="p-1 text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
      </form>
    </div>
  </div>
</div>
@endsection
