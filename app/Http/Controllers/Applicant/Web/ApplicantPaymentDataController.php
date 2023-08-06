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
        return view('web.applicant.application-payment-data');
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
        

        DB::transaction(function () use ($loggedInApplicant) {
            
            // $applicationFee = env('DEFAULT_APPLICANT_PAYMENT_AMOUNT');

            // $remitaPaymentOptions = [
            //     'surname' => $loggedInApplicant->surname,
            //     'other_names' => $loggedInApplicant->other_names,
            //     'email_address' => $loggedInApplicant->email,
            //     'description' => 'Payment for Scholarship Application Fees',
            //     'amount' => $applicationFee,
            //     'service_type_id' => env('REMITA_SERVICE_TYPE_ID'),
            // ];
            
            // $response = $this->remitaServiceInterface->initiatePayment($remitaPaymentOptions);
            // $applicantPayment = $this->applicantPaymentDataServiceInterface->getApplicantPaymentDataFiltered([
            //     'applicant_id' => $loggedInApplicant->id,
            //     'status' => 'paid'
            // ]);

            // if (count($applicantPayment) === 0) {
            //     $this->applicantPaymentDataServiceInterface->createApplicantPaymentDataRecord([
            //         'applicant_id' => $loggedInApplicant->id,
            //         'amount' => env('DEFAULT_APPLICANT_PAYMENT_AMOUNT'),
            //     ]);
            // }
        });
        
        return redirect()->route('show-applicant-bio-data-form');
    }
}
