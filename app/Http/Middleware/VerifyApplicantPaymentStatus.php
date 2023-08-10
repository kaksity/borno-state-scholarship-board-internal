<?php

namespace App\Http\Middleware;

use App\Services\Interfaces\ApplicantPaymentDataServiceInterface;
use App\Services\Interfaces\RemitaServiceInterface;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApplicantPaymentStatus
{
    public function __construct(
        private ApplicantPaymentDataServiceInterface $applicantPaymentDataServiceInterface,
        private RemitaServiceInterface $remitaServiceInterface,
    )
    {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedInApplicant = auth('applicant')->user();

        $applicantPayment = $this->applicantPaymentDataServiceInterface->getApplicantPaymentDataFiltered([
            'applicant_id' => $loggedInApplicant->id,
        ]);
        
        if (count($applicantPayment) == 0) {
            return redirect()->route(
                'applicant.applicant-payment-data.index'
            )->with('status', 'You must complete the payment step before proceeding');
        }

        $applicantPaymentPaymentData = $applicantPayment[0];

        if ($applicantPaymentPaymentData->status === 'paid') {
            return $next($request);
        }

        $response = $this->remitaServiceInterface->verifyPayment([
            'rrr' => $applicantPaymentPaymentData->rrr
        ]);
        
        if ($response->status === '00') {
            $this->applicantPaymentDataServiceInterface->updateApplicantPaymentDataRecord([
                'completed_payment_at' => Carbon::now(),
                'status' => 'paid'
            ], $applicantPaymentPaymentData->id);

            return $next($request);
        }

        return redirect()->route(
            'applicant.applicant-payment-data.index'
        )->with('status', 'You must complete the payment step before proceeding');
    }
}
