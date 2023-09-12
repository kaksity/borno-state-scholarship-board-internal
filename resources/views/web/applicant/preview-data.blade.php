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
            @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('applicant.applicant-preview-data.store') }}" method="POST">
                @csrf
                <h4>Personal Information</h4>
                <div class="form-group row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div>
                                
                                <img src="{{
                                    $applicant->applicantBioData?->passport_path != null
                                        ? str_replace('public', '/storage', $applicant->applicantBioData?->passport_path)
                                        : '/assets/images/placeholder/user-place-holder.jpg'
                                }}" alt="" style="height:9rem;width:9rem;object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="name" class="form-label">
                                <b>Surname</b>
                            </label>
                            <div>
                                {{ $applicant->surname }}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="name" class="form-label">
                                <b>Other Names</b>
                            </label>
                            <div>
                                {{ $applicant->other_names }}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="name" class="form-label">
                                <b>Guardian Full Name</b>
                            </label>
                            <div>
                                {{ $applicant->applicantBioData?->guardian_full_name }}
                            </div>
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">
                            <b>Phone Number</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->phone_number }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">
                            <b>Gender</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->gender }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">
                            <b>National Identity Number(NIN)</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->nin }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">
                            <b>Date of Birth</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->date_of_birth }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Contact Address</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->contact_address }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Place of Birth</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->place_of_birth }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Local Government Area</b>
                        </label>
                        <div>
                            {{ $applicant->applicantBioData?->lga?->name }}
                        </div>
                    </div>
                </div>
                <h4>School Information</h4>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">
                            <b>Name of Institution</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->name_of_institution }}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">
                            <b>Course of Study</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->course_of_study }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Identity Number</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->identity_number }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Admission Date</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->date_of_admission }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">
                            <b>Graduation Date</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->date_of_graduation }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">
                            <b>Current Level</b>
                        </label>
                        <div>
                            {{ $applicant->applicantSchoolData?->current_level }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">
                            <b>Programme</b>
                        </label>
                        <div>
                            {{ $applicant->programme }}
                        </div>
                    </div>
                </div>
                <h4>Bank</h4>
                <div class="table-responsive">
                    <table id="basic-btn" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Bank</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->applicantBankData as $applicantBank)
                                <tr>
                                    {{-- {{ $applicantBank }} --}}
                                    <td>{{ $applicantBank->bank->name }}</td>
                                    <td>{{ $applicantBank->account_name }}</td>
                                    <td>{{ $applicantBank->account_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h4>Qualifications Obtained</h4>
                <div class="table-responsive">
                    <table id="basic-btn" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>School Name</th>
                                <th>Qualification Obtained</th>
                                <th>From Date</th>
                                <th>To Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->applicantQualificationData as $applicantQualification)
                                <tr>
                                    <td>{{ $applicantQualification->school_attended }}</td>
                                    <td>{{ $applicantQualification->qualificationType->name }}</td>
                                    <td>{{ $applicantQualification->from_date }}</td>
                                    <td>{{ $applicantQualification->to_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h4>Uploaded Documents</h4>
                <div class="table-responsive">
                    <table id="basic-btn" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Uploaded Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->applicantUploadedDocumentData as $applicantUploadDocument)
                                <tr>
                                    <td>{{ $applicantUploadDocument->documentType->name }}</td>
                                    <td>
                                        <a href="{{str_replace('public', '/storage', $applicantUploadDocument->file_path)}}"class="btn btn-secondary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h4>Referees</h4>
                <div class="table-responsive">
                    <table id="basic-btn" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Full Name</th>
                                <th>Occupation</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->applicantRefereeData as $applicantReferee)
                                <tr>
                                    <td>{{ $applicantReferee->full_name }}</td>
                                    <td>{{ $applicantReferee->occupation }}</td>
                                    <td>{{ $applicantReferee->phone_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    @if ($applicant->status === 'Applying')
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    @else
                            <button type="button" class="btn btn-primary" disabled>Application already been submitted</button>
                            <a href="{{ route('applicant.generate-submit-application-pdf') }}" class="btn btn-secondary">Generate PDF</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
