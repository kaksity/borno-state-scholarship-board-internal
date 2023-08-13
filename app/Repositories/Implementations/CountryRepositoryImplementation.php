<?php

namespace App\Repositories\Implementations;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;

class CountryRepositoryImplementation implements CountryRepositoryInterface
{
    public function __construct(
        private Country $country
    )
    {
        
    }

    public function createCountryRecord($data)
    {
        return $this->country->create($data);
    }

    public function updateCountryRecord($data, $id)
    {
        $this->country->where([
            'id' => $id
        ])->update($data);
    }

    public function deleteCountryRecord($id)
    {
        $this->country->where([
            'id' => $id
        ])->delete();
    }

    public function getCountryById($id, $relationships = [])
    {
        return $this->country->with($relationships)->where([
            'id' => $id
        ])->first();
    }
    public function getCountries($relationships = [])
    {
        return $this->country->with($relationships)->orderBy('name', 'ASC')->get();
    }
}
