@extends('web.admin.layout')
@section('page-content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Message Details</h5>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">
                    <b>
                        Full Name
                    </b>
                </label>
                <div>
                    {{ $message->full_name }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">
                    <b>
                        Email Address
                    </b>
                </label>
                <div>
                    {{ $message->email_address }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">
                    <b>
                        Subject
                    </b>
                </label>
                <div>
                    {{ $message->subject }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="form-label">
                    <b>
                        Content
                    </b>
                </label>
                <div>
                    {{ $message->content }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
