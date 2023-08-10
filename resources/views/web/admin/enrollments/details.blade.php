@extends('web.admin.layout');

@section('page-content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">View Enrollment Data</h5>
            <small class="text-muted float-end">View Enrollment Data</small>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <div> {{ $enrollment->first_name }} {{ $enrollment->middle_name }} {{$enrollment->surname}} </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label class="form-label" for="basic-icon-default-fullname">Date of Birth</label>
                    <div>{{ $enrollment->date_of_birth }}</div>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Local Government Area</label>
                    <div>{{ $enrollment->ward->lga->name }}</div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Ward</label>
                    <div>{{ $enrollment->ward->lga->name }}</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Facility</label>
                    <div>{{ $enrollment->facility->name }}</div>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Gender</label>
                    <div>{{ $enrollment->gender }}</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Category</label>
                    <div>{{ $enrollment->category->name }}</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2">
                    <label for="exampleFormControlSelect1" class="form-label">Marital Status</label>
                    <div>{{ $enrollment->maritalStatus->name }}</div>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2">
                    <label class="form-label" for="basic-icon-default-phone">Phone Number</label>
                    <div>{{ $enrollment->phone_number }}</div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2">
                    <label class="form-label" for="basic-icon-default-phone">Number of Children</label>
                    <div>{{ $enrollment->number_of_children }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
