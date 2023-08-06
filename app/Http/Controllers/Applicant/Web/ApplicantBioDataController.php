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

class ApplicantBioDataController extends Controller
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
    public function create()
    {
        $lgas = $this->lgaServiceInterface->getLgas();

        $countries = $this->countryServiceInterface->getCountries();

        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            auth('applicant')->user()->email,
            [
                'applicantBioData',
                'applicantSchoolData'
            ]
        );

        $data = [
            'lgas' => $lgas,
            'countries' => $countries,
            'applicant' => $applicant
        ];

        return view('web.applicant.bio-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicantBioDataRequest $request)
    {
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            auth('applicant')->user()->email,
            [
                'applicantBioData',
                'applicantSchoolData'
            ]
        );

        DB::transaction(function () use ($request, $applicant) {
            $this->applicantSchoolDataServiceInterface->updateApplicantSchoolDataRecord([
                'country_id' => $request->country_id,
                'course_of_study' => $request->course_of_study,
                'admission_status' => $request->admission_status,
                'name_of_institution' => $request->name_of_institution,
            ], $applicant->applicantSchoolData->id);

            $this->applicantBioDataServiceInterface->updateApplicantBioDataRecord([
                'nin' => $request->nin,
                'phone_number' => $request->phone_number,
                'contact_address' => $request->contact_address,
                'date_of_birth' => $request->date_of_birth,
                'lga_id' => $request->lga_id,
            ], $applicant->applicantBioData->id);
        });
        return redirect()->route('show-applicant-qualification-form');
    }
}
