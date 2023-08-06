authentication/login@php
    use App\Models\Application;
    use App\Models\School;
    $check = Application::where('email', session('email'))->value('id');
    $status = Application::where('email', session('email'))->value('status');
    $country = School::where('status', 'Active')->distinct()->orderBy('country','ASC')->get('country');
    //echo $check;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Application</title>
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
    <style>
        .hdd{
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
                        <div class="col-6">
                            <h5>Scholarship Application | {{ $status }}</h5>
                        </div>
                        <div class="col text-right">
                            <h5><a href="/logout" class="btn btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a></h5>
                        </div>
                    </div>
                    <input type="hidden" id="email" value="{{ session('email') }}">
                    <input type="hidden" id="type" value="{{ session('type') }}">
                    @if($check > 0)
                    @foreach ($data as $row)
                        <input type="hidden" id="id" value="{{ $row->id }}">
                        <div class="card-body" id="formDatau">
                            <div class="bt-wizard" id="progresswizard">
                                <ul class="nav nav-pills nav-fill mb-3">
                                    <li class="nav-item"><a href="#progress-t-tab1" class="nav-link" data-toggle="tab">Personal-Data</a></li>
                                    <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">Qualifications</a></li>
                                    <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">Upload</a></li>
                                </ul>
                                <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  style="width: 0%;"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="progress-t-tab1">
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Personal details</h5>
                                                <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Full Name</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->name }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Phone</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->phone }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->email }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">LGA</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->lga }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">NIN</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->nin }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Course of Study</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->course }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">School</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->school }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Country</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->country }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Full Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Full Name" value="{{ $row->name }}" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" placeholder="Phone" value="{{ $row->phone }}" id="phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">LGA</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="LGA" value="{{ $row->lga }}" id="lga">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">NIN</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" placeholder="NIN" value="{{ $row->nin }}" id="nin">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Course of Study</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Course of Study" value="{{ $row->course }}" id="course">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Admission Status</label>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single form-control" id="status">
                                                                <option value="{{ $row->admissionStatus }}">Select Admission Status</option>
                                                                <option value="Admitted">Admitted</option>
                                                                <option value="Awaiting">Awaiting Admission</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="statusRespond" style="display: none;">
                                                    @if(strtolower(session('type')) != 'undergraduate')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Country of Studies</label>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single form-control" id="country">
                                                                <option value="{{ $row->country }}">Select Country</option>
                                                                @foreach ($country as $rows)
                                                                <option value="{{ $rows->country }}">{{ $rows->country }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Name of School</label>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single form-control" id="loadSchool"></select>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="form-group row">
                                                        <label for="course" class="col-sm-3 col-form-label">Country of Studies</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="{{ $row->country }}" id="country" placeholder="Country of Studies">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="course" class="col-sm-3 col-form-label">Name of School</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="{{ $row->school }}" id="loadSchool" placeholder="Name of School">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-t-tab2">
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Personal details</h5>
                                                <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-22">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Primary*</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->primary }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Secondary*</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->secondary }}
                                                        </div>
                                                    </div>
                                                    @if (strtolower(session('type'))=='phd' || strtolower(session('type'))=='msc')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Undergraduate*</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->under }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if (strtolower(session('type'))=='phd')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Msc*</label>
                                                        <div class="col-sm-9">
                                                            {{ $row->msc }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                    
                                                </form>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-22">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Primary*</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Primary" value="{{ $row->primary }}" id="primary">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Secondary*</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Secondary" value="{{ $row->secondary }}" id="secondary">
                                                        </div>
                                                    </div>
                                                    @if (strtolower(session('type'))=='phd' || strtolower(session('type'))=='msc')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Undergraduate*</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Undergraduate" value="{{ $row->under }}" id="undergraduate">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if (strtolower(session('type'))=='phd')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label font-weight-bolder">Msc*</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Msc" value="{{ $row->msc }}" id="msc">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="progress-t-tab3">
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Personal details</h5>
                                                <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-222">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">Primary*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->fileprimary) }}" download="{{ $row->id }}Primary"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">Secondary*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filesecondary) }}" download="{{ $row->id }}Secondary"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    @if (strtolower($row->type)=='phd' || strtolower(session('type'))=='msc')
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">Undergraduate*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->fileunder) }}" download="{{ $row->id }}Undergraduate"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Transcript*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filetranscript) }}" download="{{ $row->id }}Transcript"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if (strtolower($row->type)=='phd')
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">Msc*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filemsc) }}" download="{{ $row->id }}Msc"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">Indigine*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->fileindigine) }}" download="{{ $row->id }}Indigine"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label font-weight-bolder">NIN*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filenin) }}" download="{{ $row->id }}NIN"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Admission*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->fileadmission) }}" download="{{ $row->id }}Admission"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Tuition Fee*</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filefee) }}" download="{{ $row->id }}Fee"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Passport</label>
                                                        <div class="col-sm-6">
                                                            <a class="btn btn-round btn-primary btn-sm" href="{{ asset('/storage/upload/'.$row->filepastport) }}" download="{{ $row->id }}Passport"><i class="feather icon-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-222">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="fileprimary" class="col-sm-3 col-form-label">Primary School*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="fileprimary" placeholder="Primary">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filesecondary" class="col-sm-3 col-form-label">Secondary School*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filesecondary" placeholder="Secondary">
                                                        </div>
                                                    </div>
                                                    @if (strtolower(session('type'))=='phd' || strtolower(session('type'))=='msc')
                                                    <div class="form-group row">
                                                        <label for="fileundergraduate" class="col-sm-3 col-form-label">Undergraduate</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="fileundergraduate" placeholder="Undergraduate">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filenin" class="col-sm-3 col-form-label">Transcript*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filetranscript" placeholder="Transcript">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if (strtolower(session('type'))=='phd')
                                                    
                                                    <div class="form-group row">
                                                        <label for="filemsc" class="col-sm-3 col-form-label">Msc</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filemsc" placeholder="Msc">
                                                        </div>
                                                    </div>
                                                    @endif

                                                    @if (strtolower(session('type'))=='undergraduate')
                                                        <div class="hdd">
                                                        <input type="file" class="form-control pic" id="fileundergraduate">
                                                        <input type="file" class="form-control pic" id="filetranscript">
                                                        <input type="file" class="form-control pic" id="filemsc">                                   
                                                        </div>

                                                    @endif
                                                    
                                                    @if (strtolower(session('type'))=='msc')
                                                        <div class="hdd">
                                                        <input type="file" class="form-control pic" id="filemsc">                                   
                                                        </div>

                                                    @endif

                                                    <div class="form-group row">
                                                        <label for="fileindigine" class="col-sm-3 col-form-label">Indigine</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="fileindigine" placeholder="Indigine">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filenin" class="col-sm-3 col-form-label">NIN</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filenin" placeholder="NIN">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filenin" class="col-sm-3 col-form-label">Admission*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="fileadmission" placeholder="NIN">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filenin" class="col-sm-3 col-form-label">Tuition Fee*</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filefee" placeholder="Tuition Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="filenin" class="col-sm-3 col-form-label">Passport</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control pic" id="filepastport" placeholder="Passport">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-block mb-4" id="submitFormu">Submit</button>
                                        </form>
                                    </div>
                                    <div class="row justify-content-between btn-page">
                                        <div class="col">
                                            <a href="#!" class="btn btn-primary button-previous">Previous</a>
                                        </div>
                                        <div class="col text-right">
                                            <a href="#!" class="btn btn-primary button-next">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" class="card-body text-center" id="closeDatau">
                            <i class="feather icon-check-circle display-3 text-success"></i>
                            <h5 class="mt-3">Application Updated! . .</h5>
                            <p>Thank you for applying, your application is now in progress...</p>
                            <a href="/application" class="btn btn-primary btn-sm">Okay</a>
                        </div>
                        <div style="display: none;" class="card-body text-center" id="formProcessu">
                            <h4 class="mt-3 alert alert-info">Please Wait...</h4>
                        </div>
                    @endforeach
                    @else
                        <div class="card-body" id="formData">
                            <div class="bt-wizard" id="progresswizard">
                                <ul class="nav nav-pills nav-fill mb-3">
                                    <li class="nav-item"><a href="#progress-t-tab1" class="nav-link" data-toggle="tab">Personal-Data</a></li>
                                    <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">Qualifications</a></li>
                                    <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">Upload</a></li>
                                </ul>
                                <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  style="width: 0%;"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="progress-t-tab1">
                                        <form>
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Fullname*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="name" placeholder="Fullname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-3 col-form-label">Phone*</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control must" id="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lga" class="col-sm-3 col-form-label">LGA*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="lga" placeholder="LGA">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nin" class="col-sm-3 col-form-label">NIN*</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control must" id="nin" placeholder="NIN">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="course" class="col-sm-3 col-form-label">Course of Study*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="course" placeholder="Course">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Admission Status*</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-basic-single form-control must" id="status">
                                                        <option value="">Select Admission Status</option>
                                                        <option value="Admitted">Admitted</option>
                                                        <option value="Awaiting">Awaiting Admission</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="statusRespond" style="display: none;">

                                            @if(strtolower(session('type')) != 'undergraduate')
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Country of Studies</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-basic-single form-control" id="country">
                                                        <option value="">Select Country</option>
                                                        @foreach ($country as $rows)
                                                        <option value="{{ $rows->country }}">{{ $rows->country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name of School</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-basic-single form-control" id="loadSchool"></select>
                                                </div>
                                            </div>
                                            @else
                                            <div class="form-group row">
                                                <label for="course" class="col-sm-3 col-form-label">Country of Studies</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="country" placeholder="Country of Studies">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="course" class="col-sm-3 col-form-label">Name of School</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="loadSchool" placeholder="Name of School">
                                                </div>
                                            </div>
                                            @endif
                                            
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="progress-t-tab2">
                                        <form>
                                            <div class="form-group row">
                                                <label for="primary" class="col-sm-3 col-form-label">Primary School*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="primary" placeholder="Primary">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="secondary" class="col-sm-3 col-form-label">Secondary School*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="secondary" placeholder="Secondary">
                                                </div>
                                            </div>
                                            @if (strtolower(session('type'))=='phd' || strtolower(session('type'))=='msc')
                                            <div class="form-group row">
                                                <label for="undergraduate" class="col-sm-3 col-form-label">Undergraduate</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="undergraduate" placeholder="Undergraduate">
                                                </div>
                                            </div>
                                            @endif
                                            @if (strtolower(session('type'))=='phd')
                                            <div class="form-group row">
                                                <label for="msc" class="col-sm-3 col-form-label">Msc</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control must" id="msc" placeholder="Msc">
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="progress-t-tab3">
                                        <form class="text-center">
                                            <div class="form-group row">
                                                <label for="fileprimary" class="col-sm-3 col-form-label">Primary School*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="fileprimary" placeholder="Primary">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filesecondary" class="col-sm-3 col-form-label">Secondary School*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="filesecondary" placeholder="Secondary">
                                                </div>
                                            </div>
                                            @if (strtolower(session('type'))=='phd' || strtolower(session('type'))=='msc')
                                            <div class="form-group row">
                                                <label for="fileundergraduate" class="col-sm-3 col-form-label">Undergraduate</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic" id="fileundergraduate" placeholder="Undergraduate">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filenin" class="col-sm-3 col-form-label">Transcript*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="filetranscript" placeholder="Transcript">
                                                </div>
                                            </div>
                                            @endif
                                            @if (strtolower(session('type'))=='undergraduate')
                                                <div class="hdd">
                                                <input type="file" class="form-control pic" id="fileundergraduate">
                                                <input type="file" class="form-control pic" id="filetranscript">
                                                <input type="file" class="form-control pic" id="filemsc">                                   
                                                </div>

                                            @endif
                                                    
                                            @if (strtolower(session('type'))=='msc')
                                                <div class="hdd">
                                                <input type="file" class="form-control pic" id="filemsc">                                   
                                                </div>

                                            @endif
                                            @if (strtolower(session('type'))=='phd')
                                            <div class="form-group row">
                                                <label for="filemsc" class="col-sm-3 col-form-label">Msc</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic" id="filemsc" placeholder="Msc">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label for="fileindigine" class="col-sm-3 col-form-label">Indigine*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="fileindigine" placeholder="Indigine">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filenin" class="col-sm-3 col-form-label">NIN*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="filenin" placeholder="NIN">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filenin" class="col-sm-3 col-form-label">Admission*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="fileadmission" placeholder="NIN">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filenin" class="col-sm-3 col-form-label">Tuition Fee*</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic must" id="filefee" placeholder="Tuition Fee">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="filenin" class="col-sm-3 col-form-label">Passport</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control pic" id="filepastport" placeholder="Passport">
                                                </div>
                                            </div>
                                        <button type="button" class="btn btn-primary btn-block mb-4" id="submitForm">Submit</button>
                                        </form>
                                    </div>
                                    <div class="row justify-content-between btn-page">
                                        <div class="col">
                                            <a href="#!" class="btn btn-primary button-previous">Previous</a>
                                        </div>
                                        <div class="col text-right">
                                            <a href="#!" class="btn btn-primary button-next">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" class="card-body text-center" id="closeData">
                            <i class="feather icon-check-circle display-3 text-success"></i>
                            <h5 class="mt-3">Application Done! . .</h5>
                            <p>Thank you for applying, your application is now in progress...</p>
                            <a href="/application" class="btn btn-primary btn-sm">Okay</a>
                        </div>
                        <div style="display: none;" class="card-body text-center" id="formProcess">
                            <h4 class="mt-3 alert alert-info">Please Wait...</h4>
                        </div>
                    @endif
                </div>
            </div>
            <!-- [ Smart-Wizard ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>

@if (strtolower(session('type'))=='undergraduate')
    <input type="hidden" class="form-control" id="undergraduate">
    <input type="hidden" class="form-control" id="msc">
@endif
@if (strtolower(session('type'))=='msc')
    <input type="hidden" class="form-control" id="msc" >
@endif
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/menu-setting.min.js"></script>
<form>
    @csrf
</form>

<script src="assets/js/plugins/jquery.bootstrap.wizard.min.js"></script>
<script>
    $(document).ready(function() {
        $('#besicwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });
        $('#btnwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });
        $('#progresswizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last',
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#progresswizard .progress-bar').css({
                    width: $percent + '%'
                });
            }
        });
        $('#validationwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last',
            onNext: function(tab, navigation, index) {
                if (index == 1) {
                    if (!$('#validation-t-name').val()) {
                        $('#validation-t-name').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                    if (!$('#validation-t-email').val()) {
                        $('#validation-t-email').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                    if (!$('#validation-t-pwd').val()) {
                        $('#validation-t-pwd').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                }
                if (index == 2) {
                    if (!$('#validation-t-address').val()) {
                        $('#validation-t-address').focus();
                        $('.form-2').addClass('was-validated');
                        return false;
                    }
                }
            }
        });
        $('#tabswizard').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
        });
        $('#verticalwizard').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
        });
    });
</script>
<script>
    
$(document).on('change','#status', function() {
    //alert(this.value);
    var status = document.getElementById('status').value;
    var statusRespond = document.getElementById('statusRespond');
    if(status=='Admitted'){
        statusRespond.style.display='block';
    }else{
        statusRespond.style.display='none';
    }
});
    
$(document).on('change','#country', function() {
    //alert(this.value);
    var _token   = $('input[name="_token"]').val();
    var country = document.getElementById('country').value;
    var files =  new FormData();
    //alert(country);
    document.getElementById('loadSchool').innerHTML = '<option>Loading...</option>';
    files.append('country',country);
    files.append('_token',_token);

    $.ajax({
      url: "/getSchool",
      type: "POST",
      data: files,
      processData: false,
      contentType: false,
      cache: false,
      success: function(result){
        //alert(result);
        document.getElementById('loadSchool').innerHTML = result;
      }

    });

});
    
$(document).on('click','#submitForm', function() {
    //alert(this.value);
    var _token   = $('input[name="_token"]').val();
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var status = document.getElementById('status').value;
    if(status=='Admitted'){
        var country = document.getElementById('country').value;
        var loadSchool = document.getElementById('loadSchool').value;
    }else{
        var country = status;
        var loadSchool = status;
    }   
    var lga = document.getElementById('lga').value;
    var nin = document.getElementById('nin').value;
    var type = document.getElementById('type').value;
    var course = document.getElementById('course').value;
    var primary = document.getElementById('primary').value;
    var secondary = document.getElementById('secondary').value;
    var undergraduate = document.getElementById('undergraduate').value;
    var msc = document.getElementById('msc').value;
    var closeData = document.getElementById('closeData');
    var formData = document.getElementById('formData');
    var formProcess = document.getElementById('formProcess');
    var ePic = document.getElementsByClassName('pic');
    var must = document.getElementsByClassName('must');
    var mustLength = must.length;

    var files =  new FormData();
    var dot = '';
    var picN1 = '';
    var picN2 = '';
    var picN3 = '';
    var picN4 = '';
    var picN5 = '';
    var picN6 = '';

    var picN7 = '';
    var picN8 = '';
    var picN9 = '';
    var picN10 = '';

    var flag = 1;
    //alert(name);
    for(var i = 0; i < mustLength; i++){
        if(must[i].value==''){
            alert('Field With (*) Cant Be Empty');
            flag = 0;
            return false;
        }
    }

    function pdf(pdf=''){
        if(pdf=='pdf' || pdf=='PDF' || pdf=='Pdf' || pdf=='PDf' || pdf==''){

        }else{
            alert('You can only upload PDF format');
            return false;
            flag = 0;
            return false;
        }
    }
        
    //alert(league);
     //document.getElementById('formData').innerHTML = load;

        dot=(ePic[0].value).split("?")[0].split("#")[0].split('.').pop();
        picN1 = email+'primary.'+dot;
        pdf(dot);

        dot=(ePic[1].value).split("?")[0].split("#")[0].split('.').pop();
        picN2 = email+'secondary.'+dot;
        pdf(dot);

        dot=(ePic[2].value).split("?")[0].split("#")[0].split('.').pop();
        picN3 = email+'under.'+dot;
        pdf(dot);

        dot=(ePic[3].value).split("?")[0].split("#")[0].split('.').pop();
        picN7 = email+'filetranscript.'+dot;
        pdf(dot);

        dot=(ePic[4].value).split("?")[0].split("#")[0].split('.').pop();
        picN4 = email+'msc.'+dot;
        pdf(dot);

        dot=(ePic[5].value).split("?")[0].split("#")[0].split('.').pop();
        picN5 = email+'indigine.'+dot;
        pdf(dot);

        dot=(ePic[6].value).split("?")[0].split("#")[0].split('.').pop();
        picN6 = email+'nin.'+dot;
        pdf(dot);

        dot=(ePic[7].value).split("?")[0].split("#")[0].split('.').pop();
        picN8 = email+'fileadmission.'+dot;
        pdf(dot);

        dot=(ePic[8].value).split("?")[0].split("#")[0].split('.').pop();
        picN9 = email+'filefee.'+dot;
        pdf(dot);

        dot=(ePic[9].value).split("?")[0].split("#")[0].split('.').pop();
        picN10 = email+'filepastport.'+dot;
        pdf(dot);
        //alert('Is about go...'+email);
        if(flag==1){
            formProcess.style.display='block';
            formData.style.display='none';
            
            files.append('filep',$('.pic')[0].files[0]);
            files.append('files',$('.pic')[1].files[0]);
            files.append('fileu',$('.pic')[2].files[0]);
            files.append('filetrans',$('.pic')[3].files[0]);
            files.append('filem',$('.pic')[4].files[0]);
            files.append('filei',$('.pic')[5].files[0]);
            files.append('filen',$('.pic')[6].files[0]);
            files.append('filead',$('.pic')[7].files[0]);
            files.append('filefe',$('.pic')[8].files[0]);
            files.append('filepast',$('.pic')[9].files[0]);
            files.append('name',name);
            files.append('phone',phone);
            files.append('email',email);
            files.append('course',course);
            files.append('type',type);
            files.append('lga',lga);
            files.append('status',status);
            files.append('country',country);
            files.append('school',loadSchool);
            files.append('nin',nin);
            files.append('primary',primary);
            files.append('secondary',secondary);
            files.append('under',undergraduate);
            files.append('msc',msc);
            files.append('fileprimary',picN1);
            files.append('filesecondary',picN2);
            files.append('fileunder',picN3);
            files.append('filemsc',picN4);
            files.append('filenin',picN6);
            files.append('fileindigine',picN5);
            files.append('filetranscript',picN7);
            files.append('fileadmission',picN8);
            files.append('filefee',picN9);
            files.append('filepastport',picN10);
            files.append('_token',_token);

            function makeAjaxRequest(i) {
              return new Promise((resolve, reject) => {
                $.ajax({
                      url: "/addApplication",
                      type: "POST",
                      data: files,
                      processData: false,
                      contentType: false,
                      cache: false,
                      success: function(result){
                        //alert(result);
                      }
                    });
                setTimeout(() => {
                  resolve();
                }, 6000);
              });
            }

            async function performAjaxLoop() {
                try {
                  await makeAjaxRequest(i);
                } catch (error) {
                  console.error("Error occurred during AJAX request:", error);
                }
                //window.location.href='/product upload';
                closeData.style.display='block';
                formProcess.style.display='none';
            }
            performAjaxLoop();
        }

});
    
$(document).on('click','#submitFormu', function() {
    //alert(this.value);
    var _token   = $('input[name="_token"]').val();
    var status = document.getElementById('status').value;
    if(status=='Admitted'){
        var country = document.getElementById('country').value;
        var loadSchool = document.getElementById('loadSchool').value;
    }else{
        var country = status;
        var loadSchool = status;
    }   
    var id = document.getElementById('id').value;
    var email = document.getElementById('email').value;
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var lga = document.getElementById('lga').value;
    var nin = document.getElementById('nin').value;
    var course = document.getElementById('course').value;
    var primary = document.getElementById('primary').value;
    var secondary = document.getElementById('secondary').value;
    var undergraduate = document.getElementById('undergraduate').value;
    var msc = document.getElementById('msc').value;
    var closeData = document.getElementById('closeDatau');
    var formData = document.getElementById('formDatau');
    var formProcess = document.getElementById('formProcessu');
    var ePic = document.getElementsByClassName('pic');
    var must = document.getElementsByClassName('must');
    var mustLength = must.length;
    var files =  new FormData();
    var dot = '';
    var picN1 = '';
    var picN2 = '';
    var picN3 = '';
    var picN4 = '';
    var picN5 = '';
    var picN6 = '';

    var picN7 = '';
    var picN8 = '';
    var picN9 = '';
    var picN10 = '';

    var flag = 1;
    //alert(id);
    for(var i = 0; i < mustLength; i++){
        if(must[i].value==''){
                //alert('Field With (*) Cant Be Empty');
                //return false;
        }
    }

    function pdf(pdf=''){
        if(pdf=='pdf' || pdf=='PDF' || pdf=='Pdf' || pdf=='PDf' || pdf==''){

        }else{
            alert('You can only upload PDF format');
            flag = 0;
            return false;
        }
    }
        
    //alert(league);
    //document.getElementById('formData').innerHTML = load;

        dot=(ePic[0].value).split("?")[0].split("#")[0].split('.').pop();
        picN1 = email+'primary.'+dot;
        pdf(dot);

        dot=(ePic[1].value).split("?")[0].split("#")[0].split('.').pop();
        picN2 = email+'secondary.'+dot;
        pdf(dot);

        dot=(ePic[2].value).split("?")[0].split("#")[0].split('.').pop();
        picN3 = email+'under.'+dot;
        pdf(dot);

        dot=(ePic[3].value).split("?")[0].split("#")[0].split('.').pop();
        picN7 = email+'filetranscript.'+dot;
        pdf(dot);

        dot=(ePic[4].value).split("?")[0].split("#")[0].split('.').pop();
        picN4 = email+'msc.'+dot;
        pdf(dot);

        dot=(ePic[5].value).split("?")[0].split("#")[0].split('.').pop();
        picN5 = email+'indigine.'+dot;
        pdf(dot);

        dot=(ePic[6].value).split("?")[0].split("#")[0].split('.').pop();
        picN6 = email+'nin.'+dot;
        pdf(dot);

        dot=(ePic[7].value).split("?")[0].split("#")[0].split('.').pop();
        picN8 = email+'fileadmission.'+dot;
        pdf(dot);

        dot=(ePic[8].value).split("?")[0].split("#")[0].split('.').pop();
        picN9 = email+'filefee.'+dot;
        pdf(dot);

        dot=(ePic[9].value).split("?")[0].split("#")[0].split('.').pop();
        picN10 = email+'filepastport.'+dot;
        pdf(dot);
        //alert('Is about go...'+email);
        if(flag==1){
            formProcess.style.display='block';
            formData.style.display='none';

            files.append('filep',$('.pic')[0].files[0]);
            files.append('files',$('.pic')[1].files[0]);
            files.append('fileu',$('.pic')[2].files[0]);
            files.append('filetrans',$('.pic')[3].files[0]);
            files.append('filem',$('.pic')[4].files[0]);
            files.append('filei',$('.pic')[5].files[0]);
            files.append('filen',$('.pic')[6].files[0]);
            files.append('filead',$('.pic')[7].files[0]);
            files.append('filefe',$('.pic')[8].files[0]);
            files.append('filepast',$('.pic')[9].files[0]);
            files.append('id',id);
            files.append('name',name);
            files.append('phone',phone);
            files.append('course',course);
            files.append('lga',lga);
            files.append('status',status);
            files.append('country',country);
            files.append('school',loadSchool);
            files.append('nin',nin);
            files.append('primary',primary);
            files.append('secondary',secondary);
            files.append('under',undergraduate);
            files.append('msc',msc);
            files.append('fileprimary',picN1);
            files.append('filesecondary',picN2);
            files.append('fileunder',picN3);
            files.append('filemsc',picN4);
            files.append('filenin',picN6);
            files.append('fileindigine',picN5);
            files.append('filetranscript',picN7);
            files.append('fileadmission',picN8);
            files.append('filefee',picN9);
            files.append('filepastport',picN10);
            files.append('_token',_token);
            //alert('Is about go...'+email);

            function makeAjaxRequest(i) {
              return new Promise((resolve, reject) => {
                $.ajax({
                  url: "/updateApp",
                  type: "POST",
                  data: files,
                  processData: false,
                  contentType: false,
                  cache: false,
                  success: function(result){
                    //alert(result);
                    closeData.style.display='block';
                    formProcess.style.display='none';
                  }

                });
                setTimeout(() => {
                  resolve();
                }, 6000);
              });
            }

            async function performAjaxLoop() {
                try {
                  await makeAjaxRequest(i);
                } catch (error) {
                  console.error("Error occurred during AJAX request:", error);
                }
                //window.location.href='/product upload';
                closeData.style.display='block';
                formProcess.style.display='none';
            }
            performAjaxLoop();


        }
            
});

</script>

</body>
</html>
