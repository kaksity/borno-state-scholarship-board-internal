<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantPaymentDataRepositoryInterface;
use App\Services\Interfaces\ApplicantPaymentDataServiceInterface;

class ApplicantPaymentDataServiceImplementation implements ApplicantPaymentDataServiceInterface
{
    public function __construct(
        private ApplicantPaymentDataRepositoryInterface $applicantPaymentDataRepositoryInterface
    )
    {}

    public function createApplicantPaymentDataRecord($data)
    {
        return $this->applicantPaymentDataRepositoryInterface->createApplicantPaymentDataRecord(
            $data
        );
    }
    public function getApplicantPaymentDataById($id, $relationships = [])
    {
        return $this->applicantPaymentDataRepositoryInterface->getApplicantPaymentDataById(
            $id,
            $relationships
        );
    }
    public function updateApplicantPaymentDataRecord($data, $id)
    {
        $this->applicantPaymentDataRepositoryInterface->updateApplicantPaymentDataRecord(
            $data,
            $id
        );
    }
    public function deleteApplicantPaymentDataRecord($id)
    {
        $this->applicantPaymentDataRepositoryInterface->deleteApplicantPaymentDataRecord(
            $id
        );
    }
    public function getApplicantPaymentDataFiltered($getApplicantPaymentFilterOptions, $relationships = [])
    {
        return $this->applicantPaymentDataRepositoryInterface->getApplicantPaymentDataFiltered(
            $getApplicantPaymentFilterOptions,
            $relationships
        );
    }

    public function getApplicantPaymentDataByReference($reference, $relationships = [])
    {
        return $this->applicantPaymentDataRepositoryInterface->getApplicantPaymentDataByReference(
            $reference,
            $relationships
        );
    }
}
