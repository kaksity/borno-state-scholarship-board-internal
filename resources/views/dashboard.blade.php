@php
    use App\Models\Application;
    use App\Models\School;
    $all = Application::count();
    $approved = Application::where('status', 'Approved')->count();
    $rejected = Application::where('status', 'Rejected')->count();
    $pending = Application::where('status', 'Inprogress')->count();
    $phd = Application::where('status', 'Approved')->where('type', 'Phd')->count();
    $msc = Application::where('status', 'Approved')->where('type', 'Msc')->count();
    $ug = Application::where('status', 'Approved')->where('type', 'Undergraduate')->count();
    //echo $check;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BORNO | SCHOLARSHIP</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Scholarship" />
    <meta name="keywords" content="">
    <meta name="author" content="Assalafi" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    

</head>
<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div " >
                
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span class="mb-0 font-weight-bold">{{ session('email') }}</span>
                            <div id="more-details"><small>{{ session('accType') }}<i class="fa fa-chevron-down m-l-5"></i></small></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#!" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                            <li class="list-inline-item"><a href="#!"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">0</small></a></li>
                            <li class="list-inline-item"><a href="/logout" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item">
                        <a href="/application" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/applicants" class="nav-link "><span class="pcoded-micon"><i class="fas fa-graduation-cap"></i></span><span class="pcoded-mtext">Applicants</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/schools" class="nav-link "><span class="pcoded-micon"><i class="fas fa-building"></i></span><span class="pcoded-mtext">Schools</span></a>
                    </li>

                </ul>
                
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
        
            
                <div class="m-header">
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                    <a href="#!" class="b-brand">
                        <!-- ========   change your logo hear   ============ -->
                        <!-- ========   change your logo hear   ============ -->
                        <img src="assets/images/logo.png" alt="" class="logo">
                    </a>
                    <a href="#!" class="mob-toggler">
                        <i class="feather icon-more-vertical"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                            <div class="search-bar">
                                <input type="text" class="form-control border-0 shadow-none" placeholder="search here">
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <div class="dropdown drp-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head">
                                        <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>{{ session('email') }}</span>
                                        <a href="/logout" class="dud-logout" title="Logout">
                                            <i class="feather icon-power"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            
    </header>
    <!-- [ Header ] end -->
    
    

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-user-clock f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Pending Applicants</h6>
                                <h2 class="m-b-0">{{ $pending }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-user-check f-30 text-c-green"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Approved Applicants</h6>
                                <h2 class="m-b-0">{{ $approved }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-user-times f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Rejected Applicants</h6>
                                <h2 class="m-b-0">{{ $rejected }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-user-tie f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">PHD</h6>
                                <h2 class="m-b-0">{{ $phd }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">MSC</h6>
                                <h2 class="m-b-0">{{ $msc }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-user-graduate f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">UG</h6>
                                <h2 class="m-b-0">{{ $ug }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- prject ,team member start -->
            <!-- prject ,team member start -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</div>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-project.js"></script>
</body>

</html>
