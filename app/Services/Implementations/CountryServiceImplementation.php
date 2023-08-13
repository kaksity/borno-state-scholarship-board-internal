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
    public function createCountryRecord($data)
    {
        return $this->countryRepositoryInterface->createCountryRecord(
            $data
        );
    }

    public function updateCountryRecord($data, $id)
    {
        $this->countryRepositoryInterface->updateCountryRecord(
            $data,
            $id
        );
    }

    public function deleteCountryRecord($id)
    {
        $this->countryRepositoryInterface->deleteCountryRecord(
            $id
        );
    }

    public function getCountryById($id, $relationships = [])
    {
        return $this->countryRepositoryInterface->getCountryById(
            $id,
            $relationships
        );
    }

    public function getCountries($relationships = [])
    {
        return $this->countryRepositoryInterface->getCountries();
    }
}
