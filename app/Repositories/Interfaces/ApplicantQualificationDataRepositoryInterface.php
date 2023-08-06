<?php

namespace App\Repositories\Interfaces;

interface ApplicantQualificationDataRepositoryInterface
{
    public function createApplicantQualificationDataRecord($data);
    public function getApplicantQualificationDataById($id, $relationships = []);
    public function updateApplicantQualificationDataRecord($data, $id);
    public function deleteApplicantQualificationDataRecord($id);
    public function getApplicantQualificationDataFiltered($getApplicantQualificationFilterOptions, $relationships = []);
}
