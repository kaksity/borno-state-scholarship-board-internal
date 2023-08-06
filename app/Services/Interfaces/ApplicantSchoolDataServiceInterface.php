<?php

namespace App\Services\Interfaces;

interface ApplicantSchoolDataServiceInterface
{
    public function createApplicantSchoolDataRecord($data);
    public function getApplicantSchoolDataById($id, $relationships = []);
    public function updateApplicantSchoolDataRecord($data, $id);
}
