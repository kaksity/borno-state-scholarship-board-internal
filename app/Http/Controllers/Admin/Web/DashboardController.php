<?php

namespace App\Http\Controllers\Admin\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\EnrollmentRepositoryInterface;
use App\Repositories\Interfaces\FacilityRepositoryInterface;
use App\Repositories\Interfaces\LgaRepositoryInterface;
use App\Repositories\Interfaces\MaritalStatusRepositoryInterface;
use App\Repositories\Interfaces\WardRepositoryInterface;

class DashboardController extends Controller
{
    // public function __construct(
    //     private FacilityRepositoryInterface $facilityRepositoryInterface,
    //     private MaritalStatusRepositoryInterface $maritalStatusRepositoryInterface,
    //     private CategoryRepositoryInterface $categoryRepositoryInterface,
    //     private LgaRepositoryInterface $lgaRepositoryInterface,
    //     private WardRepositoryInterface $wardRepositoryInterface,
    //     private EnrollmentRepositoryInterface $enrollmentRepositoryInterface
    // )
    // {}
 
    public function index()
    {
        return view('web.admin.dashboard.view');
    }
    // public function index()
    // {
    //     $facilities = $this->facilityRepositoryInterface->getFacilities();
    //     $maritalStatuses = $this->maritalStatusRepositoryInterface->getMaritalStatuses();
    //     $categories = $this->categoryRepositoryInterface->getCategories();
    //     $lgas = $this->lgaRepositoryInterface->getLgas();
    //     $wards = $this->wardRepositoryInterface->getWards();
        
    //     $maleEnrollments = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'gender' => 'male'
    //     ]);

    //     $femaleEnrollments = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'gender' => 'female'
    //     ]);

    //     $underFive = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'category' => 'Under Five'
    //     ]);
        
    //     $aged = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'category' => 'Aged'
    //     ]);

    //     $poor = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'category' => 'Pregnant Women'
    //     ]);

    //     $pregnantWomen = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'category' => 'Pregnant Women'
    //     ]);
    //     $physicallyChallenged = $this->enrollmentRepositoryInterface->getEnrollmentByFilterOptions([
    //         'category' => 'Physically Challenged'
    //     ]);
    //     return view('web.admin.dashboard.view', [
    //         'facilities' => $facilities,
    //         'maritalStatuses' => $maritalStatuses,
    //         'categories' => $categories,
    //         'lgas' => $lgas,
    //         'wards' => $wards,
    //         'maleEnrollments' => $maleEnrollments,
    //         'femaleEnrollments' => $femaleEnrollments,
    //         'underFive' => $underFive,
    //         'aged' => $aged,
    //         'poor' => $poor,
    //         'pregnantWomen' => $pregnantWomen,
    //         'physicallyChallenged' => $physicallyChallenged,
    //     ]);
    // }
}
