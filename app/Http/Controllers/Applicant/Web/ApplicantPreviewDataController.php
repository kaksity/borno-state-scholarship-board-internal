<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\BioData\UpdateApplicantBioDataRequest;
use App\Services\Interfaces\ApplicantBioDataServiceInterface;
use App\Services\Interfaces\ApplicantSchoolDataServiceInterface;
use App\Services\Interfaces\ApplicantServiceInterface;
use App\Services\Interfaces\CountryServiceInterface;
use App\Services\Interfaces\LgaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantPreviewDataController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private CountryServiceInterface $countryServiceInterface,
        private ApplicantServiceInterface $applicantServiceInterface,
        private ApplicantBioDataServiceInterface $applicantBioDataServiceInterface,
        private ApplicantSchoolDataServiceInterface $applicantSchoolDataServiceInterface,
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
        
        $this->applicantServiceInterface->updateApplicantRecord([
            'status' => 'Submitted'
        ], $loggedInApplicant->id);
        
        return back()->with('status', 'Application for Scholarship has been submitted successfully');
    }
}
