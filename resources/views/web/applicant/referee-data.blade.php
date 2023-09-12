@extends('web.applicant.layout')
@section('applicant-page-content')
<div class="bt-wizard" id="progresswizard">
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-bio-data.index') }}" class="nav-link">
                Personal Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-school-data.index') }}" class="nav-link">
                Academic Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('applicant.applicant-bank-data.index')}}" class="nav-link">
                Bank Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('applicant.applicant-qualification-data.index')}}" class="nav-link">
                Qualification Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-uploaded-document-data.index') }}" class="nav-link">
                Document Upload Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-referee-data.index') }}" class="nav-link">
                Referee Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-preview-data.index') }}" class="nav-link">
                Preview & Submit
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active show" id="progress-t-tab2">
            @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('applicant.applicant-referee-data.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Full Name</label>
                        <div>
                            <input type="text" class="form-control" name="full_name"
                                value="{{ old('full_name') }}" placeholder="Full Name">
                            @error('full_name')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Occupation</label>
                        <div>
                            <input type="text" class="form-control" name="occupation"
                                value="{{ old('occupation') }}" placeholder="Occupation">
                            @error('occupation')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Phone Number</label>
                        <div>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ old('phone_number') }}" placeholder="Phone Number">
                            @error('phone_number')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    {{-- @if (auth('applicant')->user()->status === 'Applying') --}}
                        <button type="submit" class="btn btn-primary">Save</button>
                    {{-- @else
                        <button type="button" class="btn btn-primary" disabled>Application already been submitted</button>
                    @endif --}}
                </div>
            </form>

            <div class="table-responsive">
                <table id="basic-btn" class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Full Name</th>
                            <th>Occupation</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicantReferees as $applicantReferee)
                            <tr>
                                <td>{{ $applicantReferee->full_name }}</td>
                                <td>{{ $applicantReferee->occupation }}</td>
                                <td>{{ $applicantReferee->phone_number }}</td>
                                <td>
                                    <form action="{{ route('applicant.applicant-referee-data.destroy', [$applicantReferee->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                <a href="{{ route('applicant.applicant-uploaded-document-data.index') }}" class="btn btn-secondary">Go Back</a>
                <a href="{{ route('applicant.applicant-preview-data.index') }}" class="btn btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>
@endsection
