<?php

namespace App\Repositories\Interfaces;

interface ApplicantSchoolDataRepositoryInterface
{
    public function createApplicantSchoolDataRecord($data);
    public function getApplicantSchoolDataById($id, $relationships = []);
    public function updateApplicantSchoolDataRecord($data, $id);
}
