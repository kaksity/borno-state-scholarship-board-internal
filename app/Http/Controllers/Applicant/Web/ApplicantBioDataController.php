<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\BioData\UpdateApplicantBioDataRequest;
use App\Services\Interfaces\ApplicantBioDataServiceInterface;
use App\Services\Interfaces\ApplicantSchoolDataServiceInterface;
use App\Services\Interfaces\ApplicantServiceInterface;
use App\Services\Interfaces\CountryServiceInterface;
use App\Services\Interfaces\LgaServiceInterface;
use App\Services\Interfaces\SchoolServiceInterface;

class ApplicantBioDataController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private CountryServiceInterface $countryServiceInterface,
        private ApplicantServiceInterface $applicantServiceInterface,
        private ApplicantBioDataServiceInterface $applicantBioDataServiceInterface,
        private ApplicantSchoolDataServiceInterface $applicantSchoolDataServiceInterface,
        private SchoolServiceInterface $schoolServiceInterface,
    )
    {
    }
    public function index()
    {
        $lgas = $this->lgaServiceInterface->getLgas();

        $countries = $this->countryServiceInterface->getCountries();

        $schools = $this->schoolServiceInterface->getSchoolsFiltered([

        ]);


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
            'applicant' => $applicant,
            'schools' => $schools
        ];

        return view('web.applicant.bio-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateApplicantBioDataRequest $request)
    {
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            auth('applicant')->user()->email,
            [
                'applicantBioData',
                'applicantSchoolData'
            ]
        );

        $updateApplicantBioDataRecordOptions = $request->safe()->except('passport');

        if ($request->passport) {
            $extension = $request->passport->getClientOriginalExtension();
            $fileNameToStore = time().uniqid().'.'.$extension;
            
            $path = $request->passport->storeAs('public/passports', $fileNameToStore);

            $updateApplicantBioDataRecordOptions =  array_merge($updateApplicantBioDataRecordOptions, [
                'passport_path' => $path
            ]);
        }

        $this->applicantBioDataServiceInterface->updateApplicantBioDataRecord(
            $updateApplicantBioDataRecordOptions,
            $applicant->applicantBioData->id
        );

        return redirect()->route('applicant.applicant-school-data.index');
    }
}
