<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\BioData\UpdateApplicantBioDataRequest;
use App\Services\Interfaces\ApplicantBioDataServiceInterface;
use App\Services\Interfaces\ApplicantPaymentDataServiceInterface;
use App\Services\Interfaces\ApplicantSchoolDataServiceInterface;
use App\Services\Interfaces\ApplicantServiceInterface;
use App\Services\Interfaces\CountryServiceInterface;
use App\Services\Interfaces\LgaServiceInterface;
use App\Services\Interfaces\RemitaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;

class ApplicantPaymentDataController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private CountryServiceInterface $countryServiceInterface,
        private ApplicantServiceInterface $applicantServiceInterface,
        private ApplicantPaymentDataServiceInterface $applicantPaymentDataServiceInterface,
        private RemitaServiceInterface $remitaServiceInterface,
    )
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $remitaPaymentInformation = null;
        return view('web.applicant.application-payment-data')->with([
            'remitaPaymentInformation' => $remitaPaymentInformation
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $loggedInApplicant = auth('applicant')->user();

        $remitaPaymentInformation = DB::transaction(function () use ($loggedInApplicant) {
            
            $applicationFee = env('DEFAULT_APPLICANT_PAYMENT_AMOUNT');

            $remitaPaymentOptions = [
                'surname' => $loggedInApplicant->surname,
                'other_names' => $loggedInApplicant->other_names,
                'email_address' => $loggedInApplicant->email,
                'description' => 'Payment for Scholarship Application Fees',
                'amount' => $applicationFee,
                'service_type_id' => env('REMITA_SERVICE_TYPE_ID'),
            ];

            $applicantPayments = $this->applicantPaymentDataServiceInterface->getApplicantPaymentDataFiltered([
                'applicant_id' => $loggedInApplicant->id,
            ]);

            $applicantPaymentData = $applicantPayments[0] ?? null;

            if (is_null($applicantPaymentData)) {
                
                $response = $this->remitaServiceInterface->initiatePayment($remitaPaymentOptions);

                $applicantPaymentData = $this->applicantPaymentDataServiceInterface->createApplicantPaymentDataRecord([
                    'applicant_id' => $loggedInApplicant->id,
                    'rrr' => $response['rrr'],
                    'order_id' => $response['order_id'],
                    'amount' => $response['amount'],
                ]);
            }

            $remitaConfigurations = $this->remitaServiceInterface->getRemitaConfigurations();
            return [
                'rrr' => $applicantPaymentData->rrr,
                'order_id' => $applicantPaymentData->order_id,
                'hash' => $this->remitaServiceInterface->generateRemitaHash([
                    'merchant_id' => $remitaConfigurations['merchant_id'],
                    'rrr' => $applicantPaymentData->rrr,
                    'api_key' => $remitaConfigurations['api_key'],
                ], false),
                'merchant_id' => $remitaConfigurations['merchant_id'],
                'public_key' => $remitaConfigurations['public_key'],
            ];
        });
        return view('web.applicant.application-payment-data')->with([
            'remitaPaymentInformation' => $remitaPaymentInformation
        ]);
    }
}
