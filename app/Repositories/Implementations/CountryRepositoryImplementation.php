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
    public function getCountries($relationships = [])
    {
        return $this->country->orderBy('name', 'ASC')->get();
    }
}
