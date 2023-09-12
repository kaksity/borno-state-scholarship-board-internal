<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ApplicantServiceInterface;
use Illuminate\Support\Str;

class ApplicantPreviewDataController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface,
    )
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        return view('web.applicant.preview-data')->with($data);
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
        
        $trackingCode = strtoupper(Str::random(10));
        
        $this->applicantServiceInterface->updateApplicantRecord([
            'status' => 'Submitted',
            'tracking_code' => $trackingCode
        ], $loggedInApplicant->id);
        
        return back()->with('status', 'Application for Scholarship has been submitted successfully');
    }
}
