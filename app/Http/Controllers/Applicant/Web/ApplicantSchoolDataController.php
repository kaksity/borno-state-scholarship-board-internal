<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\SchoolData\UpdateApplicantSchoolDataRequest;
use App\Services\Interfaces\ApplicantSchoolDataServiceInterface;
use App\Services\Interfaces\ApplicantServiceInterface;
use App\Services\Interfaces\CountryServiceInterface;
use App\Services\Interfaces\LgaServiceInterface;
use App\Services\Interfaces\SchoolServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantSchoolDataController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private CountryServiceInterface $countryServiceInterface,
        private ApplicantServiceInterface $applicantServiceInterface,
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
                'applicantSchoolData',
                'applicantSchoolData'
            ]
        );

        $data = [
            'lgas' => $lgas,
            'countries' => $countries,
            'applicant' => $applicant,
            'schools' => $schools
        ];

        return view('web.applicant.school-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateApplicantSchoolDataRequest $request)
    {
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            auth('applicant')->user()->email,
            [
                'applicantSchoolData'
            ]
        );

        $this->applicantSchoolDataServiceInterface->updateApplicantSchoolDataRecord(
            $request->validated(),
            $applicant->applicantSchoolData->id
        );
        
        return redirect()->route('applicant.applicant-bank-data.index');
    }
}
