<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantBankDataRepositoryInterface;
use App\Services\Interfaces\ApplicantBankDataServiceInterface;

class ApplicantBankDataServiceImplementation implements ApplicantBankDataServiceInterface
{
    public function __construct(
        private ApplicantBankDataRepositoryInterface $applicantBankDataRepositoryInterface
    )
    {}

    public function createApplicantBankDataRecord($data)
    {
        return $this->applicantBankDataRepositoryInterface->createApplicantBankDataRecord(
            $data
        );
    }
    public function getApplicantBankDataById($id, $relationships = [])
    {
        return $this->applicantBankDataRepositoryInterface->getApplicantBankDataById(
            $id,
            $relationships
        );
    }
    public function updateApplicantBankDataRecord($data, $id)
    {
        $this->applicantBankDataRepositoryInterface->updateApplicantBankDataRecord(
            $data,
            $id
        );
    }
    public function deleteApplicantBankDataRecord($id)
    {
        $this->applicantBankDataRepositoryInterface->deleteApplicantBankDataRecord(
            $id
        );
    }
    public function getApplicantBankDataFiltered(
        $getApplicantBankFilterOptions,
        $relationships = []
    )
    {
        return $this->applicantBankDataRepositoryInterface->getApplicantBankDataFiltered(
            $getApplicantBankFilterOptions,
            $relationships
        );
    }
}
