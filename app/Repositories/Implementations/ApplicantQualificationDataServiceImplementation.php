<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantQualificationDataRepositoryInterface;
use App\Repositories\Interfaces\ApplicantQualificationDataServiceInterface;

class ApplicantQualificationDataServiceImplementation implements ApplicantQualificationDataServiceInterface
{
    public function __construct(
        private ApplicantQualificationDataRepositoryInterface $applicantQualificationDataRepositoryInterface
    )
    {}

    public function createApplicantQualificationDataRecord($data)
    {
        return $this->applicantQualificationDataRepositoryInterface->createApplicantQualificationDataRecord(
            $data
        );
    }

    public function getApplicantQualificationDataById($id, $relationships = [])
    {
        return $this->applicantQualificationDataRepositoryInterface->getApplicantQualificationDataById(
            $id,
            $relationships
        );
    }

    public function updateApplicantQualificationDataRecord($data, $id)
    {
        $this->applicantQualificationDataRepositoryInterface->updateApplicantQualificationDataRecord(
            $data,
            $id
        );
    }

    public function deleteApplicantQualificationDataRecord($id)
    {
        $this->applicantQualificationDataRepositoryInterface->deleteApplicantQualificationDataRecord(
            $id
        );
    }

    public function getApplicantQualificationDataFiltered($getApplicantQualificationFilterOptions, $relationships = [])
    {
        return $this->applicantQualificationDataRepositoryInterface->getApplicantQualificationDataFiltered(
            $getApplicantQualificationFilterOptions,
            $relationships
        );
    }
}
