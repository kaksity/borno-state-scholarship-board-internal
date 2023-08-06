<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantUploadedDocumentDataRepositoryInterface;
use App\Services\Interfaces\ApplicantUploadedDocumentDataServiceInterface;

class ApplicantUploadedDocumentDataServiceImplementation implements ApplicantUploadedDocumentDataServiceInterface
{
    public function __construct(
        private ApplicantUploadedDocumentDataRepositoryInterface $applicantUploadedDocumentDataRepositoryInterface
    )
    {}

    public function createApplicantUploadedDocumentDataRecord($data)
    {
        return $this->applicantUploadedDocumentDataRepositoryInterface->createApplicantUploadedDocumentDataRecord(
            $data
        );
    }
    public function getApplicantUploadedDocumentDataById($id, $relationships = [])
    {
        return $this->applicantUploadedDocumentDataRepositoryInterface->getApplicantUploadedDocumentDataById(
            $id,
            $relationships
        );
    }
    public function updateApplicantUploadedDocumentDataRecord($data, $id)
    {
        $this->applicantUploadedDocumentDataRepositoryInterface->updateApplicantUploadedDocumentDataRecord(
            $data,
            $id
        );
    }
    public function deleteApplicantUploadedDocumentDataRecord($id)
    {
        $this->applicantUploadedDocumentDataRepositoryInterface->deleteApplicantUploadedDocumentDataRecord(
            $id
        );
    }
    public function getApplicantUploadedDocumentDataFiltered(
        $getApplicantUploadedDocumentFilterOptions,
        $relationships = []
    )
    {
        return $this->applicantUploadedDocumentDataRepositoryInterface->getApplicantUploadedDocumentDataFiltered(
            $getApplicantUploadedDocumentFilterOptions,
            $relationships
        );
    }
}
