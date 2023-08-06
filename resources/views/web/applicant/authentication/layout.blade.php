<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
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
</head>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
    <div class="flex-grow-1">
        <div class="h-100 d-md-flex align-items-center auth-side-img">
            <div class="col-sm-10 auth-content w-auto">
                <img src="assets/images/auth/auth-logo.png" alt="" class="img-fluid">
            </div>
        </div>
        <div class="auth-side-form">
            <div class="auth-content">
                @yield('authentication-component')
            </div>
        </div>
    </div>
</div>
@include('web.applicant.authentication.partials._scripts')
</body>

</html>
