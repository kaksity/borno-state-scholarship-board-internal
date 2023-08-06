<?php

namespace App\Services\Interfaces;

interface ApplicantQualificationDataServiceInterface
{
    public function createApplicantQualificationDataRecord($data);
    public function getApplicantQualificationDataById($id, $relationships = []);
    public function updateApplicantQualificationDataRecord($data, $id);
    public function deleteApplicantQualificationDataRecord($id);
    public function getApplicantQualificationDataFiltered($getApplicantQualificationFilterOptions, $relationships = []);
}
