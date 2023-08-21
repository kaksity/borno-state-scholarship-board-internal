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
            <form action="{{ route('applicant.applicant-bio-data.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Surname</label>
                        <div>
                            <input type="text" class="form-control" disabled name="surname"
                                value="{{ $applicant->surname }}" placeholder="Surname">
                            @error('surname')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Other Names</label>
                        <div>
                            <input type="text" class="form-control" disabled name="other_names"
                                value="{{ $applicant->other_names }}" placeholder="Other Names">
                            @error('other_names')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Guardian Full Name</label>
                        <div>
                            <input type="text" class="form-control" name="guardian_full_name"
                                value="{{ $applicant->applicantBioData->guardian_full_name }}" placeholder="Other Names">
                            @error('guardian_full_name')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">Phone Number</label>
                        <div>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ $applicant->applicantBioData->phone_number ?? old('phone_number') }}"
                                placeholder="Phone Number">
                            @error('phone_number')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Gender</label>
                        <div>
                            <select name="gender" class="form-control">
                                <option value="">Select a Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">National Identity Number(NIN)</label>
                        <div>
                            <input type="text" class="form-control"
                                value="{{ $applicant->applicantBioData->nin ?? old('nin') }}" name="nin"
                                placeholder="National Identity Number(NIN)">
                            @error('nin')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Date of Birth</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Date of Birth (YYYY-MM-DD)"
                                value="{{ $applicant->applicantBioData->date_of_birth ?? old('date_of_birth') }}" name="date_of_birth">
                            @error('date_of_birth')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Contact Address</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Contact Address"
                                value="{{ $applicant->applicantBioData->contact_address ?? old('contact_address') }}" name="contact_address">
                            @error('contact_address')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Place of Birth</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Place of Birth"
                                value="{{ $applicant->applicantBioData->place_of_birth ?? old('place_of_birth') }}" name="place_of_birth">
                            @error('place_of_birth')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Local Government Area</label>
                        <div>
                            <select class="js-example-basic-single form-control" name="lga_id">
                                <option value="">Select Local Government Aread</option>
                                @foreach ($lgas as $lga)
                                <option value="{{ $lga->id }}"
                                    @if($lga->id == old('lga_id')) selected @endif
                                    @if($lga->id == $applicant->applicantBioData->lga_id) selected @endif
                                >
                                    {{ $lga->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('lga_id')
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
