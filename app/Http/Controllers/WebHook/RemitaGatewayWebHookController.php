<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ApplicantPaymentDataServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RemitaGatewayWebHookController extends Controller
{
    public function __construct(
        private ApplicantPaymentDataServiceInterface $applicantPaymentDataServiceInterface
    ) {
    }

    public function processWebHook(Request $request)
    {
        $rrr = $request[0]['rrr'];

        $applicationPayment = $this->applicantPaymentDataServiceInterface->getApplicantPaymentDataByReference(
            $rrr
        );

        if (is_null($applicationPayment)) {
            return 'Not Ok';
        }

        $this->applicantPaymentDataServiceInterface->updateApplicantPaymentDataRecord([
            'completed_payment_at' => Carbon::now(),
            'status' => 'paid'
        ], $applicationPayment->id);

        return 'Ok';
    }
}
