@extends('web.applicant.layout')
@section('applicant-page-content')
<div class="bt-wizard" id="progresswizard">
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item"><a href="{{ route('show-applicant-bio-data-form') }}" class="nav-link">Personal-Data</a></li>
        <li class="nav-item"><a href="{{route('show-applicant-qualification-form')}}" class="nav-link">Qualifications</a></li>
        <li class="nav-item"><a href="{{ route('show-applicant-uploaded-document-form') }}" class="nav-link">Document Uploads</a></li>
        <li class="nav-item"><a href="{{ route('show-applicant-preview-data-form') }}" class="nav-link">Preview & Submit</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active show" id="progress-t-tab1">
            <form action="{{ route('process-applicant-bio-data-form') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="phone" class="col-form-label">Phone Number*</label>
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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">NIN*</label>
                        <div>
                            <input type="text" class="form-control"
                                value="{{ $applicant->applicantBioData->nin ?? old('nin') }}" name="nin"
                                placeholder=" NIN">
                            @error('nin')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                @if(auth('applicant')->user()->programme !== 'Undergraduate')
                <div class="form-group row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label class="col-form-label">Country of Studies</label>
                        <div>
                            <select class="js-example-basic-single form-control" name="country_id" id="countrySelectOptions">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    @if($applicant->applicantSchoolData->country_id === $country->id) selected @endif
                                    @if (old('country_id') == $country->id) selected @endif
                                >
                                    {{ $country->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Name of Institution</label>
                        @if(auth('applicant')->user()->programme === 'Undergraduate')
                        <div>
                            <input type="text" class="form-control" placeholder="Name of Institution"
                                value="{{ $applicant->applicantSchoolData->name_of_institution ?? old('name_of_institution') }}" name="name_of_institution">
                            @error('name_of_institution')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @else
                        <div>
                            <select class="js-example-basic-single form-control" id="nameOfInstitutionSelect" name="name_of_institution">
                                <option value="">Select School Names</option>
                            </select>
                            @error('name_of_institution')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nin" class="col-form-label">Admission Status</label>
                        <div>
                            <select class="js-example-basic-single form-control" name="admission_status">
                                <option value="">Select Admission Status</option>
                                <option value="Admitted"
                                    @if($applicant->applicantSchoolData->admission_status == 'Admitted') selected @endif
                                    @if(old('admission_status') == 'Admitted') selected @endif
                                >
                                    Admitted
                                </option>
                                <option value="Awaiting"
                                    @if($applicant->applicantSchoolData->admission_status == 'Awaiting') selected @endif
                                    @if(old('admission_status') == 'Awaiting') selected @endif
                                >
                                    Awaiting Admission
                                </option>
                            </select>
                            @error('admission_status')
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

@section('custom_scripts')
    <script>
        $(() => {
            $('#countrySelectOptions').change(e => {
                const selectedCountry = $("#countrySelectOptions option:selected").val();
                getSchools(selectedCountry)
            })
        })

        function getSchools(countryId) {
            $.ajax({
                url: `/api/schools?country_id=${countryId}`,
                method: 'get',
                success: function(data) {
                    let html = ``
                    
                    data.forEach(element => {
                        html = `${html}
                                <option value="${element.school_name}"
                                >
                                    ${element.school_name}
                                </option>`
                    });
                    
                    $('#nameOfInstitutionSelect').html(html)
                }
            })
        }
    </script>
@endsection
