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
        <div class="tab-pane active show" id="progress-t-tab1">
            <form action="{{ route('applicant.applicant-school-data.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Name of Institution</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Name of Institution"
                                value="{{ $applicant->applicantSchoolData->name_of_institution ?? old('name_of_institution') }}" name="name_of_institution">
                            @error('name_of_institution')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">Course of Study</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Course of Study"
                                value="{{ $applicant->applicantSchoolData->course_of_study ?? old('course_of_study') }}" name="course_of_study">
                            @error('course_of_study')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Identity Number</label>
                        <div>
                            <input type="text" class="form-control" name="identity_number"
                                value="{{ $applicant->applicantSchoolData->identity_number }}" placeholder="Identity Number">
                            @error('identity_number')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Admission Date</label>
                        <div>
                            <input type="text" class="form-control" name="date_of_admission"
                                value="{{ $applicant->applicantSchoolData->date_of_admission }}" placeholder="Admission Date (YYYY-MM-DD)">
                            @error('date_of_admission')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Graduation Date</label>
                        <div>
                            <input type="text" class="form-control" name="date_of_graduation"
                                value="{{ $applicant->applicantSchoolData->date_of_graduation }}" placeholder="Graduation Date (YYYY-MM-DD)">
                            @error('date_of_graduation')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">Current Level</label>
                        <div>
                            <input type="text" class="form-control" name="current_level"
                                value="{{ $applicant->applicantSchoolData->current_level ?? old('current_level') }}"
                                placeholder="Phone Number">
                            @error('current_level')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Programme</label>
                        <div>
                            <input type="text" class="form-control" disabled
                                value="{{ $applicant->programme ?? old('programme') }}" name="programme"
                                placeholder="">
                            @error('nin')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    {{-- @if (auth('applicant')->user()->status === 'Applying') --}}
                        <button type="submit" class="btn btn-primary">Save & Continue</button>
                    {{-- @else
                        <button type="button" class="btn btn-primary" disabled>Application already been submitted</button>
                    @endif --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
