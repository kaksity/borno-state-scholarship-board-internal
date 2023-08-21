<?php

namespace App\Repositories\Interfaces;

interface ApplicantRefereeDataRepositoryInterface
{
    public function createApplicantRefereeDataRecord($data);
    public function getApplicantRefereeDataById($id, $relationships = []);
    public function updateApplicantRefereeDataRecord($data, $id);
    public function deleteApplicantRefereeDataRecord($id);
    public function getApplicantRefereeDataFiltered(
        $getApplicantRefereeDataFilterOptions, $relationships = []
    );
}
