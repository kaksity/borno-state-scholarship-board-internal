<?php

namespace App\Http\Controllers\Admin\Web\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Settings\Countries\CreateCountryRequest;
use App\Http\Requests\Admin\Web\Settings\Countries\UpdateCountryRequest;
use App\Services\Interfaces\CountryServiceInterface;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function __construct(
        private CountryServiceInterface $countryServiceInterface
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = $this->countryServiceInterface->getCountries();

        $data = [
            'countries' => $countries
        ];
        return view('web.admin.settings.countries.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.settings.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCountryRequest $request)
    {
        $this->countryServiceInterface->createCountryRecord(
            $request->safe()->all()
        );

        return back()->with('success', 'Country record was created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = $this->countryServiceInterface->getCountryById(
            $id
        );

        if (is_null($country)) {
            return back()->with('error', 'Country record does not exist');
        }

        $data = [
            'country' => $country
        ];

        return view('web.admin.settings.countries.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, string $id)
    {
        $country = $this->countryServiceInterface->getCountryById(
            $id
        );

        if (is_null($country)) {
            return back()->with('error', 'Country record does not exist');
        }

        $this->countryServiceInterface->updateCountryRecord( $request->validated(), $id);

        return back()->with('success', 'Country record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = $this->countryServiceInterface->getCountryById(
            $id
        );

        if (is_null($country)) {
            return back()->with('error', 'Country record does not exist');
        }

        $this->countryServiceInterface->deleteCountryRecord($id);

        return back()->with('success', 'Country record was deleted successfully');
    }
}
