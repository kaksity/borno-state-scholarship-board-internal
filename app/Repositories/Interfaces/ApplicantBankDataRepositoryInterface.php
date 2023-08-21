<?php

namespace App\Repositories\Interfaces;

interface ApplicantBankDataRepositoryInterface
{
    public function createApplicantBankDataRecord($data);
    public function getApplicantBankDataById($id, $relationships = []);
    public function updateApplicantBankDataRecord($data, $id);
    public function deleteApplicantBankDataRecord($id);
    public function getApplicantBankDataFiltered(
        $getApplicantBankDataFilterOptions, $relationships = []
    );
}
