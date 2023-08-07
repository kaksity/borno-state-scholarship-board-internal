@extends('web.applicant.layout')
@section('applicant-page-content')
<div class="bt-wizard" id="progresswizard">
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item"><a href="{{ route('show-applicant-bio-data-form') }}" class="nav-link">Personal-Data</a></li>
        <li class="nav-item"><a href="{{route('show-applicant-qualification-form')}}" class="nav-link">Qualifications</a></li>
        <li class="nav-item"><a href="{{ route('show-applicant-uploaded-document-form') }}" class="nav-link">Document Uploads</a></li>
        <li class="nav-item"><a href="{{ route('show-applicant-preview-data-form') }}" class="nav-link">Preview & Submit</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active show" id="progress-t-tab1">
            @if (session()->has('status'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (is_null($remitaPaymentInformation))
                <form action="{{ route('process-initiate-transaction') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-danger">Pay Application Fee with Remita</button>
                        </div>
                    </div>
                </form>
            @else
                <form method="POST">
                    @csrf
                    <input name="publicKey" id="publicKey" value="{{ $remitaPaymentInformation['public_key'] }}" type="hidden">
                    <input name="merchantId" id="merchantId" value="{{ $remitaPaymentInformation['merchant_id'] }}" type="hidden">
                    <input name="orderId" id="orderId" value="{{ $remitaPaymentInformation['order_id'] }}" type="hidden">
                    <input name="hash" id="hash" value="{{ $remitaPaymentInformation['hash'] }}" type="hidden">
                    <input name="rrr" id="rrr"  value="{{ $remitaPaymentInformation['rrr']}}" type="hidden">
                </form>
            @endif
        </div>
        <div class="mt-2">
            <a href="{{ route('show-applicant-bio-data-form') }}" class="btn btn-primary">Continue</a>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
    <script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
    <script>
        $(() => {
            const merchantId = $('#merchantId').val();
            const orderId = $('#orderId').val();
            const hash = $('#hash').val();
            const rrr = $('#rrr').val();
            const publicKey = $('#publicKey').val();
            console.log({
                merchantId,
                orderId,
                hash,
                rrr,
                publicKey,
            })
            if(merchantId != undefined && hash != undefined && rrr !=undefined) {
                var paymentEngine = RmPaymentEngine.init({
                    key:publicKey,
                    processRrr: true,
                    extendedData: {
                        customFields: [
                            {
                                name: "rrr",
                                value: rrr,
                            }
                        ]
                    },
                        onSuccess: function (response) {
                            console.log('callback Successful Response', response);
                        },
                        onError: function (response) {
                            console.log('callback Error Response', response);
                        },
                        onClose: function () {
                            console.log("closed");
                        }
                });
                paymentEngine.showPaymentWidget();
            }
        })
    </script>
@endsection
