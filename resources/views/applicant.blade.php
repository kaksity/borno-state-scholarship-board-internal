@php
    use App\Models\Application;
    use App\Models\School;
    $check = Application::where('email', session('email'))->value('id');
    $status = Application::where('email', session('email'))->value('status');
    $country = School::where('status', 'Active')->distinct()->orderBy('country','ASC')->get('country');
    $sn=1;
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
    <link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-btn" class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>School</th>
                                        <th>Country</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="align-middle">
                                                {{ $sn++ }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $row->name }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $row->school }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $row->country }}
                                            </td>
                                            <td class="align-middle">
                                                {{ strtoupper($row->type) }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="form-group">
                                                    <div class="switch switch-info d-inline m-r-10">
                                                        <input type="checkbox" class="Approve" id="switch{{ $row->id }}" name="{{ $row->id }}" @if($row->status =='Approved') checked @endif>
                                                        <label for="switch{{ $row->id }}" class="cr"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-action">
                                                <button type="button" class="btn btn-icon btn-outline-primary viewData" data-toggle="modal" data-target="#update" value="{{ $row->id }}"><i class="feather icon-eye"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</div>
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Applicants Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="datas">
                
            </div>
        </div>
    </div>
</div>
<form>
    @csrf
</form>

<!-- Required Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/menu-setting.min.js"></script>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/plugins/buttons.colVis.min.js"></script>
<script src="assets/js/plugins/buttons.print.min.js"></script>
<script src="assets/js/plugins/pdfmake.min.js"></script>
<script src="assets/js/plugins/jszip.min.js"></script>
<script src="assets/js/plugins/dataTables.buttons.min.js"></script>
<script src="assets/js/plugins/buttons.html5.min.js"></script>
<script src="assets/js/plugins/buttons.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-export-custom.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-project.js"></script>
<script>
    
$(document).on('click','.viewData', function() {
    //alert(this.value);
    var _token   = $('input[name="_token"]').val();
    var id = this.value;
    var files =  new FormData();
    document.getElementById('datas').innerHTML = '<h3>Loading...</h3>';
    files.append('id',id);
    files.append('_token',_token);
    //alert(id);

    $.ajax({
      url: "/getApplicantData",
      type: "POST",
      data: files,
      processData: false,
      contentType: false,
      cache: false,
      success: function(result){
        //alert(result);
        document.getElementById('datas').innerHTML = result;
      }

    });

});

$(document).on('click','.Approve', function() {
    //alert(this.name);
    var _token   = $('input[name="_token"]').val();
    var id = this.name;
    var files =  new FormData();
    var status =  '';
    var all = document.getElementsByClassName('Approve');
    var allL = all.length;
    if(this.checked==true){
        status =  'Approved';
    }else{
        status =  'Rejected';
        //alert(status);
    }
    for(var i = 0; i < allL; i++){
        all[i].disabled=true;
    }
    
    files.append('id',id);
    files.append('status',status);
    files.append('_token',_token);

    $.ajax({
      url: "/applicantStatus",
      type: "POST",
      data: files,
      processData: false,
      contentType: false,
      cache: false,
      success: function(result){
        //alert(result);
        for(var i = 0; i < allL; i++){
            all[i].disabled=false;
        }
      }

    });

});
</script>
</body>

</html>
