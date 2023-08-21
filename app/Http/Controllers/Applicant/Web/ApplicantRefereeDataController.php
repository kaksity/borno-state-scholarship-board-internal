<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\RefereeData\CreateRefereeDataRequest;
use App\Services\Interfaces\ApplicantRefereeDataServiceInterface;
use Illuminate\Http\Request;

class ApplicantRefereeDataController extends Controller
{
    public function __construct(
        private ApplicantRefereeDataServiceInterface $applicantRefereeDataServiceInterface,
    )
    {}

    public function index()
    {
        $loggedInApplicant = auth('applicant')->user();

        $getApplicationRefereeFilterOptions = [
            'applicant_id' => $loggedInApplicant->id
        ];
        
        $applicantReferees = $this->applicantRefereeDataServiceInterface->getApplicantRefereeDataFiltered(
            $getApplicationRefereeFilterOptions,
        );
        
        $data = [
            'applicantReferees' => $applicantReferees
        ];

        return view('web.applicant.referee-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRefereeDataRequest $request)
    {
        $loggedInApplicant = auth('applicant')->user();

        $createRefereeOptions = $request->safe()->merge([
            'applicant_id' => $loggedInApplicant->id
        ])->all();

        $this->applicantRefereeDataServiceInterface->createApplicantRefereeDataRecord(
            $createRefereeOptions
        );

        return back()->with('status', 'Applicant Referee record was created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->applicantRefereeDataServiceInterface->deleteApplicantRefereeDataRecord($id);
        return back()->with('status', 'Applicant Referee record was deleted successfully');
    }
}
