<?php

namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface {
    public function getCountries($relationships = []);
}
