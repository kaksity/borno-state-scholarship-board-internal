<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantRefereeDataRepositoryInterface;
use App\Services\Interfaces\ApplicantRefereeDataServiceInterface;

class ApplicantRefereeDataServiceImplementation implements ApplicantRefereeDataServiceInterface
{
    public function __construct(
        private ApplicantRefereeDataRepositoryInterface $applicantRefereeDataRepositoryInterface
    )
    {}

    public function createApplicantRefereeDataRecord($data)
    {
        return $this->applicantRefereeDataRepositoryInterface->createApplicantRefereeDataRecord(
            $data
        );
    }
    public function getApplicantRefereeDataById($id, $relationships = [])
    {
        return $this->applicantRefereeDataRepositoryInterface->getApplicantRefereeDataById(
            $id,
            $relationships
        );
    }
    public function updateApplicantRefereeDataRecord($data, $id)
    {
        $this->applicantRefereeDataRepositoryInterface->updateApplicantRefereeDataRecord(
            $data,
            $id
        );
    }
    public function deleteApplicantRefereeDataRecord($id)
    {
        $this->applicantRefereeDataRepositoryInterface->deleteApplicantRefereeDataRecord(
            $id
        );
    }
    public function getApplicantRefereeDataFiltered(
        $getApplicantRefereeFilterOptions,
        $relationships = []
    )
    {
        return $this->applicantRefereeDataRepositoryInterface->getApplicantRefereeDataFiltered(
            $getApplicantRefereeFilterOptions,
            $relationships
        );
    }
}
