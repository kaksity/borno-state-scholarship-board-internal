<?php

namespace App\Services\Interfaces;

interface ApplicantBioDataServiceInterface
{
    public function createApplicantBioDataRecord($data);
    public function getApplicantBioDataById($id, $relationships = []);
    public function updateApplicantBioDataRecord($data, $id);
}
