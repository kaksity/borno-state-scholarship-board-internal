<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Scholarship" />
    <meta name="keywords" content="">
    <meta name="author" content="Assalafi" />
    <!-- Favicon icon -->

    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .hdd {
            position: absolute;
            left: -9999px;
            visibility: hidden;
        }
    </style>
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Main Content ] start -->
    <section class="container">
        <div class="pcoded-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ Smart-Wizard ] start -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-header">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <h3>Scholarship Application</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <h5>Status: {{ auth('applicant')->user()->status }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-right">
                                <h5>

                                    <form action="{{ route('applicant.logout.store') }}" method="POST">
                                        @csrf
                                        {{-- <li class="nav-link"><a href="{{ route('applicant.change-password.index') }}">Change
                                                Password</a></li> --}}
                                        <button type="submit" class="btn btn-sm"><i class="fas fa-sign-out-alt"></i>
                                            Logout</button>
                                    </form>
                                </h5>
                            </div>
                        </div>
                        <div class="card-body" id="formData">
                            @yield('applicant-page-content')
                        </div>
                    </div>
                </div>
                <!-- [ Smart-Wizard ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- Required Js -->
    @include('web.applicant.partials._scripts')
    @yield('custom_scripts')
</body>

</html>
