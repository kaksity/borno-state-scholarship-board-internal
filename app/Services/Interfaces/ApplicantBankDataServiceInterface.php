<?php

namespace App\Services\Interfaces;

interface ApplicantBankDataServiceInterface
{
    public function createApplicantBankDataRecord($data);
    public function getApplicantBankDataById($id, $relationships = []);
    public function updateApplicantBankDataRecord($data, $id);
    public function deleteApplicantBankDataRecord($id);
    public function getApplicantBankDataFiltered(
        $getApplicantBankFilterOptions,
        $relationships = []
    );
}
