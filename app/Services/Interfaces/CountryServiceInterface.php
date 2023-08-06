<?php

namespace App\Services\Interfaces;

interface CountryServiceInterface {
    public function getCountries($relationships = []);
}
