@foreach ($data as $row)
    <div class="card">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Personal details</h5>
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
    </div>
    <div class="card">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Qualification</h5>
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
                @if (strtolower($row->type)=='phd' || strtolower($row->type)=='msc')
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bolder">Undergraduate*</label>
                    <div class="col-sm-9">
                        {{ $row->under }}
                    </div>
                </div>
                @endif
                @if (strtolower($row->type)=='phd')
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bolder">Msc*</label>
                    <div class="col-sm-9">
                        {{ $row->msc }}
                    </div>
                </div>
                @endif
                
                
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Files</h5>
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
    </div>
@endforeach
    