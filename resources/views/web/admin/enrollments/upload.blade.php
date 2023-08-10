@extends('web.admin.layout');

@section('page-content')
<div class="col-xl">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Upload Enrollment Data</h5>
      <small class="text-muted float-end">Fill the approriate form</small>
    </div>
    <div class="card-body">
      <form action="{{ route('web.admin.enrollments.store') }}" enctype="multipart/form-data" method="post">
        @csrf
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
        <div class="mb-3">
          <label for="formFile" class="form-label">Select file to upload</label>
          <input class="form-control" name="file" type="file" id="formFile" />
          @error('file')
          <div class="p-1 text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  </div>
</div>
@endsection
