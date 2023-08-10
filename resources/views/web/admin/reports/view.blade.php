@extends('web.admin.layout');

@section('page-content')
<div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Generate Enrollment Report</h5>
        <small class="text-muted float-end">Select the parameters</small>
      </div>
      <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Gender</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Facility</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Category</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Local Government Area</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($lgas as $lga)
                    <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Ward</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($wards as $ward)
                    <option value="{{ $ward }}">{{ $ward->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">From Date</label>
                <div class="">
                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                </div>
              </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">To Date</label>
                <div class="">
                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                </div>
            </div>
            <button type="button" class="btn btn-primary">
                <span class="tf-icons bx bx-report"></span>&nbsp; Generate Report
            </button>
        </form>
      </div>
    </div>
  </div>
@endsection
