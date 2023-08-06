<?php

namespace App\Services\Implementations;

use App\Repositories\Implementations\ApplicantBioDataRepositoryImplementation;
use App\Services\Interfaces\ApplicantBioDataServiceInterface;

class ApplicantBioDataServiceImplementation implements ApplicantBioDataServiceInterface
{
    public function __construct(
        private ApplicantBioDataRepositoryImplementation $applicantBioDataRepositoryImplementation
    )
    {}

    public function createApplicantBioDataRecord($data)
    {
        return $this->applicantBioDataRepositoryImplementation->createApplicantBioDataRecord(
            $data
        );
    }

    public function getApplicantBioDataById($id, $relationships = [])
    {
        return $this->applicantBioDataRepositoryImplementation->getApplicantBioDataById(
            $id,
            $relationships
        );
    }

    public function updateApplicantBioDataRecord($data, $id)
    {
        $this->applicantBioDataRepositoryImplementation->updateApplicantBioDataRecord(
            $data,
            $id
        );
    }

}
