<?php

namespace App\Services\Implementations;

use App\Repositories\Implementations\ApplicantSchoolDataRepositoryImplementation;
use App\Services\Interfaces\ApplicantSchoolDataServiceInterface;

class ApplicantSchoolDataServiceImplementation implements ApplicantSchoolDataServiceInterface
{
    public function __construct(
        private ApplicantSchoolDataRepositoryImplementation $applicantSchoolDataRepositoryImplementation
    )
    {}

    public function createApplicantSchoolDataRecord($data)
    {
        return $this->applicantSchoolDataRepositoryImplementation->createApplicantSchoolDataRecord(
            $data
        );
    }

    public function getApplicantSchoolDataById($id, $relationships = [])
    {
        return $this->applicantSchoolDataRepositoryImplementation->getApplicantSchoolDataById(
            $id,
            $relationships
        );
    }

    public function updateApplicantSchoolDataRecord($data, $id)
    {
        $this->applicantSchoolDataRepositoryImplementation->updateApplicantSchoolDataRecord(
            $data,
            $id
        );
    }

}
