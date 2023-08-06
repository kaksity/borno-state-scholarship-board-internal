<?php

namespace App\Http\Middleware;

use App\Services\Interfaces\ApplicantPaymentDataServiceInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApplicantPaymentStatus
{
    public function __construct(
        private ApplicantPaymentDataServiceInterface $applicantPaymentDataServiceInterface
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
            'status' => 'paid'
        ]);
        if (count($applicantPayment) == 0) {
            return redirect()->route('show-applicant-payment-data')->with('status', 'You must complete the payment step before proceeding');
        }
        return $next($request);
    }
}
