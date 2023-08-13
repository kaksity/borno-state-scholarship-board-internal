@extends('web.admin.layout')
@section('page-content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit School record</h5>
            <small class="text-muted float-end">Fill in the approriate data</small>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route('admin.settings.schools.update', [$school->id]) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3 row">
                    <label for="html5-date-input" class="form-label">Country</label>
                    <select name="country_id" id="" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if($school->country_id === $country->id) selected @endif @if($country->d === old('country_id')) selected @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <div class="p-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="html5-date-input" class="form-label">School</label>
                    <input class="form-control" type="text" name="school_name" value="{{ $school->school_name ?? old('school_name')}}" />
                    @error('school_name')
                        <div class="p-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-primary">
                        <span class="tf-icons bx bx-report"></span>&nbsp; Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('editor-script')
<script>
var editor = new MediumEditor('.editable')
</script>
@endsection
