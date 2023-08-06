<?php

namespace App\Repositories\Interfaces;

interface ApplicantBioDataRepositoryInterface
{
    public function createApplicantBioDataRecord($data);
    public function getApplicantBioDataById($id, $relationships = []);
    public function updateApplicantBioDataRecord($data, $id);
}
