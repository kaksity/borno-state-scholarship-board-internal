<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ApplicantServiceInterface;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicantPDFController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface,
    )
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateSubmitApplicationPDF()
    {
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            auth('applicant')->user()->email,
            [
                'applicantBioData',
                'applicantBioData.lga',
                'applicantSchoolData',
                'applicantBankData.bank',
                'applicantRefereeData',
                'applicantSchoolData.country',
                'applicantQualificationData',
                'applicantQualificationData.qualificationType',
                'applicantUploadedDocumentData',
                'applicantUploadedDocumentData.documentType'
            ]
        );

        $data = [
            'applicant' => $applicant
        ];
        
        $pdf = PDF::loadView('pdf.submit-application', $data);
        return $pdf->download('application.pdf');
    }
}
