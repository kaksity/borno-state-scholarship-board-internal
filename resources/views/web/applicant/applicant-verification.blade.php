@extends('web.applicant.layout')
@section('applicant-page-content')
<div class="bt-wizard" id="progresswizard">
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-bio-data.index') }}" class="nav-link">
                Personal-Data
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('applicant.applicant-qualification-data.index')}}" class="nav-link">
                Qualifications
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('applicant.applicant-uploaded-document-data.index') }}" class="nav-link">
                Document Uploads
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
            <div>
                @if (session()->has('pending'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('pending') }}
                </div>
                @endif
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <div>
                <form action="{{ route('applicant.applicant-verification.store') }}" method="POST">
                    @csrf
                    <button class="btn btn-secondary">
                        Resend Verification Mail
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-2">
            <a href="{{ route('applicant.applicant-bio-data.index') }}" class="btn btn-primary">Continue</a>
        </div>
    </div>
</div>
@endsection