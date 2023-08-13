<?php

namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface {
    public function createCountryRecord($data);
    public function updateCountryRecord($data, $id);
    public function deleteCountryRecord($id);
    public function getCountryById($id, $relationships = []);
    public function getCountries($relationships = []);
}
