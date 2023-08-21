<?php

namespace App\Services\Interfaces;

interface ApplicantRefereeDataServiceInterface
{
    public function createApplicantRefereeDataRecord($data);
    public function getApplicantRefereeDataById($id, $relationships = []);
    public function updateApplicantRefereeDataRecord($data, $id);
    public function deleteApplicantRefereeDataRecord($id);
    public function getApplicantRefereeDataFiltered(
        $getApplicantRefereeFilterOptions,
        $relationships = []
    );
}
