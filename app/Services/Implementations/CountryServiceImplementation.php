<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Services\Interfaces\CountryServiceInterface;

class CountryServiceImplementation implements CountryServiceInterface
{
    public function __construct(
        private CountryRepositoryInterface $countryRepositoryInterface
    )
    {}
    public function getCountries($relationships = [])
    {
        return $this->countryRepositoryInterface->getCountries();
    }
}
