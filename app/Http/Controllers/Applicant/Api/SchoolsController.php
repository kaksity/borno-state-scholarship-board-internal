<?php

namespace App\Http\Controllers\Applicant\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\SchoolServiceInterface;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function __construct(
        private SchoolServiceInterface $schoolServiceInterface
    )
    {}

    public function index(Request $request) {
        $countryId = $request->country_id ?? null;

        $schools = $this->schoolServiceInterface->getSchoolsFiltered([
            'country_id' => $countryId
        ]);

        return $schools->map(function ($data) {
            return [
                'id' => $data->id,
                'school_name' => $data->school_name
            ];
        });
    }
}
