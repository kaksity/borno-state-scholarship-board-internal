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
        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="/admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Local Government Areas</span>
              <h3 class="card-title text-nowrap mb-2">{{ $numberOfLgas }}</h3>
            </div>
          </div>
        </div>
        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="/admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1">Schools</span>
              <h3 class="card-title text-nowrap mb-2">{{ $numberOfSchools }}</h3>
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
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Applicants(Total)</span>
                  <h3 class="card-title mb-2">{{ $undergraduate['total'] + $masters['total'] + $doctorate['total'] }}</h3>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Applicants(Undergraduate)</span>
                  <h3 class="card-title mb-2">{{ $undergraduate['total'] }}</h3>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Applicants(Masters)</span>
                  <h3 class="card-title mb-2">{{ $masters['total'] }}</h3>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Applicants(Doctorate)</span>
                  <h3 class="card-title mb-2">{{ $doctorate['total'] }}</h3>
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
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Undergraduate Applicants(Total)</span>
                  <h3 class="card-title mb-2">{{ $undergraduate['total'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Undergraduate Applicants(Applying)</span>
                  <h3 class="card-title mb-2">{{ $undergraduate['applying'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Undergraduate Applicants(Submitted)</span>
                  <h3 class="card-title mb-2">{{ $undergraduate['submitted'] }}</h3>
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
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Masters Applicants(Total)</span>
                  <h3 class="card-title mb-2">{{ $masters['total'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Masters Applicants(Applying)</span>
                  <h3 class="card-title mb-2">{{ $masters['applying'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Masters Applicants(Submitted)</span>
                  <h3 class="card-title mb-2">{{ $masters['submitted'] }}</h3>
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
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Doctorate Applicants(Total)</span>
                  <h3 class="card-title mb-2">{{ $doctorate['total'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Doctorate Applicants(Applying)</span>
                  <h3 class="card-title mb-2">{{ $doctorate['applying'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-12 col-6 mb-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="/admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Doctorate Applicants(Submitted)</span>
                  <h3 class="card-title mb-2">{{ $doctorate['submitted'] }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
