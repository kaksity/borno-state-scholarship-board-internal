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
            <form action="{{ route('applicant.applicant-qualification-data.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">School Attended</label>
                        <div>
                            <input type="text" class="form-control" name="school_attended"
                                value="{{ old('school_attended') }}" placeholder="School Attended">
                            @error('school_attended')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Qualification Obtained</label>
                        <div>
                            <select class="js-example-basic-single form-control" name="qualification_type_id">
                                <option value="">Select Qualification Obtained</option>
                                @foreach ($qualificationTypes as $qualificationType)
                                <option
                                    value="{{ $qualificationType->id }}"
                                    @if (old('qualification_type_id') == $qualificationType->id) selected @endif
                                >
                                    {{ $qualificationType->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('qualification_type_id')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">From Date</label>
                        <div>
                            <input type="text" class="form-control" name="from_date"
                                value="{{ old('from_date') }}" placeholder="From Date (YYYY-MM-DD)">
                            @error('from_date')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">To Date</label>
                        <div>
                            <input type="text" class="form-control" name="to_date"
                                value="{{ old('to_date') }}" placeholder="To Date (YYYY-MM-DD)">
                            @error('to_date')
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
                            <th>School Name</th>
                            <th>Qualification Obtained</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicantQualifications as $applicantQualification)
                            <tr>
                                {{-- {{ $applicantQualification }} --}}
                                <td>{{ $applicantQualification->school_attended }}</td>
                                <td>{{ $applicantQualification->qualificationType->name }}</td>
                                <td>{{ $applicantQualification->from_date }}</td>
                                <td>{{ $applicantQualification->to_date }}</td>
                                <td>
                                    <form action="{{ route('applicant.applicant-qualification-data.destroy', [$applicantQualification->id]) }}" method="POST">
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
                <a href="{{ route('applicant.applicant-bank-data.index') }}" class="btn btn-secondary">Go Back</a>
                <a href="{{ route('applicant.applicant-uploaded-document-data.index') }}" class="btn btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>
@endsection
