<?php

namespace App\Repositories\Interfaces;

interface SchoolRepositoryInterface
{
    public function createSchoolRecord($data);
    public function getSchoolById($id, $relationships = []);
    public function updateSchoolRecord($data, $id);
    public function deleteSchoolRecord($id);
    public function getSchoolsFiltered($getSchoolFilterOptions, $relationships = []);
}
