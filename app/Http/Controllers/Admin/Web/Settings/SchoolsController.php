<?php

namespace App\Http\Controllers\Admin\Web\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Settings\Schools\CreateSchoolRequest;
use App\Http\Requests\Admin\Web\Settings\Schools\UpdateSchoolRequest;
use App\Services\Interfaces\CountryServiceInterface;
use App\Services\Interfaces\SchoolServiceInterface;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function __construct(
        private CountryServiceInterface $countryServiceInterface,
        private SchoolServiceInterface $schoolServiceInterface,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relationships = ['country'];
        $schools = $this->schoolServiceInterface->getSchoolsFiltered([], $relationships);

        $data = [
            'schools' => $schools
        ];
        return view('web.admin.settings.schools.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = $this->countryServiceInterface->getCountries();
        
        $data = [
            'countries' => $countries
        ];
        
        return view('web.admin.settings.schools.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSchoolRequest $request)
    {
        $country = $this->countryServiceInterface->getCountryById(
            $request->country_id
        );

        if (is_null($country)) {
            return back()->with('error', 'Country record does not exist');
        }

        $this->schoolServiceInterface->createSchoolRecord(
            $request->safe()->all()
        );

        return back()->with('success', 'School record was created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countries = $this->countryServiceInterface->getCountries();

        $school = $this->schoolServiceInterface->getSchoolById(
            $id
        );

        if (is_null($school)) {
            return back()->with('error', 'School record does not exist');
        }

        $data = [
            'school' => $school,
            'countries' => $countries
        ];

        return view('web.admin.settings.schools.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, string $id)
    {
        $school = $this->schoolServiceInterface->getSchoolById(
            $id
        );

        if (is_null($school)) {
            return back()->with('error', 'School record does not exist');
        }

        $country = $this->countryServiceInterface->getCountryById(
            $request->country_id
        );

        if (is_null($country)) {
            return back()->with('error', 'Country record does not exist');
        }


        $this->schoolServiceInterface->updateSchoolRecord( $request->validated(), $id);

        return back()->with('success', 'School record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school = $this->schoolServiceInterface->getSchoolById(
            $id
        );

        if (is_null($school)) {
            return back()->with('error', 'School record does not exist');
        }

        $this->schoolServiceInterface->deleteSchoolRecord($id);

        return back()->with('success', 'School record was deleted successfully');
    }
}
