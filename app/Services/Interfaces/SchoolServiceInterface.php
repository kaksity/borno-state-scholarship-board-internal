<?php

namespace App\Services\Interfaces;

interface SchoolServiceInterface
{
    public function createSchoolRecord($data);
    public function getSchoolById($id, $relationships = []);
    public function updateSchoolRecord($data, $id);
    public function deleteSchoolRecord($id);
    public function getSchoolsFiltered($getSchoolFilterOptions, $relationships = []);
}
