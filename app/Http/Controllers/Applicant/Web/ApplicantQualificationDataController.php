<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\QualificationData\CreateQualificationDataRequest;
use App\Services\Interfaces\QualificationTypeServiceInterface;
use App\Services\Interfaces\ApplicantQualificationDataServiceInterface;
use Illuminate\Http\Request;

class ApplicantQualificationDataController extends Controller
{
    public function __construct(
        private QualificationTypeServiceInterface $qualificationTypeServiceInterface,
        private ApplicantQualificationDataServiceInterface $applicantQualificationDataServiceInterface,
    )
    {}

    public function index()
    {
        $qualificationTypes = $this->qualificationTypeServiceInterface->getQualificationTypes();

        $loggedInApplicant = auth('applicant')->user();

        $getApplicationQualificationFilterOptions = [
            'applicant_id' => $loggedInApplicant->id
        ];

        $relationships = ['qualificationType'];
        
        $applicantQualifications = $this->applicantQualificationDataServiceInterface->getApplicantQualificationDataFiltered(
            $getApplicationQualificationFilterOptions,
            $relationships
        );
        
        $data = [
            'qualificationTypes' => $qualificationTypes,
            'applicantQualifications' => $applicantQualifications
        ];

        return view('web.applicant.qualification-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQualificationDataRequest $request)
    {
        $loggedInApplicant = auth('applicant')->user();

        $createQualificationOptions = $request->safe()->merge([
            'applicant_id' => $loggedInApplicant->id
        ])->all();

        $this->applicantQualificationDataServiceInterface->createApplicantQualificationDataRecord(
            $createQualificationOptions
        );

        return back()->with('status', 'Applicant Qualification record was created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->applicantQualificationDataServiceInterface->deleteApplicantQualificationDataRecord($id);
        return back()->with('status', 'Applicant Qualification record was deleted successfully');
    }
}
