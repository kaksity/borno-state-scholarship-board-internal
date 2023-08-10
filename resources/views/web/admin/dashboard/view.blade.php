@extends('web.admin.layout')
@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome {{ auth('admin')->user()->surname }}! 🎉</h5>
              <p class="mb-4">

              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="/admin/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
      <div class="row">
        <div class="col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Local Government Areas</span>
              {{-- <h3 class="card-title text-nowrap mb-2">{{ count($lgas) }}</h3> --}}
            </div>
          </div>
        </div>
        <div class="col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Wards</span>
              {{-- <h3 class="card-title text-nowrap mb-2">{{ count($wards) }}</h3> --}}
            </div>
          </div>
        </div>
        <div class="col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Categories</span>
              {{-- <h3 class="card-title text-nowrap mb-2">{{ count($categories) }}</h3> --}}
            </div>
          </div>
        </div>
        <div class="col-3 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Facilities</span>
              {{-- <h3 class="card-title text-nowrap mb-2">{{ count($facilities) }}</h3> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Total)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($maleEnrollments) + count($femaleEnrollments) }}</h3> --}}
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Male)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($maleEnrollments) }}</h3> --}}
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Female)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($femaleEnrollments) }}</h3> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row d-flex">
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Under Five(5))</span>
                  {{-- <h3 class="card-title mb-2">{{ count($underFive) }}</h3> --}}
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Aged)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($aged) }}</h3> --}}
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Pregnant Women)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($pregnantWomen) }}</h3> --}}
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Physically Challenged)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($physicallyChallenged) }}</h3> --}}
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Enrollments(Poor)</span>
                  {{-- <h3 class="card-title mb-2">{{ count($poor) }}</h3> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
