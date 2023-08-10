<?php

namespace App\Http\Controllers\Admin\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Interfaces\LgaServiceInterface;
use App\Services\Interfaces\SchoolServiceInterface;

class DashboardController extends Controller
{
    public function __construct(
        private LgaServiceInterface $lgaServiceInterface,
        private SchoolServiceInterface $schoolServiceInterface,
    )
    {}
 
    public function index()
    {
        $lgas = $this->lgaServiceInterface->getLgas();
        $schools = $this->schoolServiceInterface->getSchoolsFiltered([]);

        return view('web.admin.dashboard.view',  [
            'lgas' => $lgas,
            'schools' => $schools
        ]);
    }
}
