@extends('web.admin.layout')
@section('page-content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create News record</h5>
            <small class="text-muted float-end">Fill in the approriate data</small>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route('admin.settings.countries.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-date-input" class="form-label">Country Name</label>
                    <input class="form-control" type="text" name="name"/>
                    @error('name')
                        <div class="p-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="tf-icons bx bx-report"></span>&nbsp; Create
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('editor-script')
<script>tinymce.init({selector:'textarea'});</script>
@endsection
