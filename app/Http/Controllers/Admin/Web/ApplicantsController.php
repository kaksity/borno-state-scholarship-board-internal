<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Applicants\ListApplicantsRequest;
use App\Services\Interfaces\ApplicantServiceInterface;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(ListApplicantsRequest $request)
    {
        $getApplicantsFilterOptions = $request->safe()->all();

        $relationships = [];

        $applicants = $this->applicantServiceInterface->getApplicantsFiltered(
            $getApplicantsFilterOptions,
            $relationships
        );

        $data = [
            'programme' => $request->programme,
            'applicants' => $applicants
        ];

        return view('web.admin.applicants.view')->with($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $relationships = [
            'applicantBioData',
            'applicantSchoolData',
            'applicantQualificationData',
            'applicantUploadedDocumentData'
        ];

        $applicant = $this->applicantServiceInterface->getApplicantById(
            $id,
            $relationships
        );

        if (is_null($applicant)) {
            return back();
        }

        $data = [
            'applicant' => $applicant
        ];

        return view('web.admin.applicants.details')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
