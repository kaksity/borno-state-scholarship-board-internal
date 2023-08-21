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
            <form action="{{ route('applicant.applicant-bank-data.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Bank</label>
                        <div>
                            <select class="js-example-basic-single form-control" name="bank_id">
                                <option value="">Select Bank</option>
                                @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}" @if (old('bank_id') === $bank->id) selected @endif
                                >
                                    {{ $bank->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('bank_id')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Account Name</label>
                        <div>
                            <input type="text" class="form-control" name="account_name"
                                value="{{ old('account_name') }}" placeholder="Account Name">
                            @error('account_name')
                            <div class="p-1 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Account Number</label>
                        <div>
                            <input type="text" class="form-control" name="account_number"
                                value="{{ old('account_number') }}" placeholder="Account Number">
                            @error('account_number')
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
                            <th>Bank</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicantBanks as $applicantBank)
                            <tr>
                                {{-- {{ $applicantBank }} --}}
                                <td>{{ $applicantBank->bank->name }}</td>
                                <td>{{ $applicantBank->account_name }}</td>
                                <td>{{ $applicantBank->account_number }}</td>
                                <td>
                                    <form action="{{ route('applicant.applicant-bank-data.destroy', [$applicantBank->id]) }}" method="POST">
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
                <a href="{{ route('applicant.applicant-bio-data.index') }}" class="btn btn-secondary">Go Back</a>
                <a href="{{ route('applicant.applicant-uploaded-document-data.index') }}" class="btn btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>
@endsection
