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
            @if (session()->has('status'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('process-initiate-transaction') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-danger">Pay Application Fee with Remita</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-2">
            <a href="{{ route('show-applicant-bio-data-form') }}" class="btn btn-primary">Continue</a>
        </div>
    </div>
</div>
@endsection
