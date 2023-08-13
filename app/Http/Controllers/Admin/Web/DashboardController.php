<?php

namespace App\Http\Controllers\Admin\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\ApplicantServiceInterface;
use App\Services\Interfaces\LgaServiceInterface;
use App\Services\Interfaces\SchoolServiceInterface;

class DashboardController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private SchoolServiceInterface $schoolServiceInterface,
        private ApplicantServiceInterface $applicantServiceInterface
    )
    {}
 
    public function index()
    {
        $lgas = $this->lgaServiceInterface->getLgas();
        $schools = $this->schoolServiceInterface->getSchoolsFiltered([]);

        $undergraduate = $this->applicantServiceInterface->getApplicantsFiltered([
            'programme' => 'Undergraduate',
        ]);

        $masters = $this->applicantServiceInterface->getApplicantsFiltered([
            'programme' => 'Masters',
        ]);

        $doctorate = $this->applicantServiceInterface->getApplicantsFiltered([
            'programme' => 'doctorate',
        ]);

        $applyingUndergraduate = $undergraduate->filter(function($data) {
            return $data->status === 'Applying';
        })->count();

        $applyingMasters = $masters->filter(function($data) {
            return $data->status === 'Applying';
        })->count();

        $applyingDoctorate = $doctorate->filter(function($data) {
            return $data->status === 'Applying';
        })->count();


        $totalNumberOfLgas = $lgas->count();
        $totalNumberOfSchools = $schools->count();

        $totalNumberOfUndergraduate = $undergraduate->count();
        $numberOfSubmittedUndergraduate = $totalNumberOfUndergraduate - $applyingUndergraduate;

        $totalNumberOfMasters = $masters->count();
        $numberOfSubmittedMasters = $totalNumberOfMasters - $applyingMasters;

        $totalNumberOfDoctorate = $doctorate->count();
        $numberOfSubmittedDoctorate = $totalNumberOfDoctorate - $applyingDoctorate;

        return view('web.admin.dashboard.view',  [
            'numberOfLgas' => $totalNumberOfLgas,
            'numberOfSchools' => $totalNumberOfSchools,
            'undergraduate' => [
                'total' => $totalNumberOfUndergraduate,
                'applying' => $applyingUndergraduate,
                'submitted' => $numberOfSubmittedUndergraduate
            ],
            'masters' => [
                'total' => $totalNumberOfMasters,
                'applying' => $applyingMasters,
                'submitted' => $numberOfSubmittedMasters,
            ],
            'doctorate' => [
                'total' => $totalNumberOfDoctorate,
                'applying' => $applyingDoctorate,
                'submitted' => $numberOfSubmittedDoctorate
            ]
        ]);
    }
}
