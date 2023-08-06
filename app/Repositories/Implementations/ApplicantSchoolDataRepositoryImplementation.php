<?php

namespace App\Repositories\Implementations;

use App\Models\ApplicantSchoolData;
use App\Repositories\Interfaces\ApplicantSchoolDataRepositoryInterface;

class ApplicantSchoolDataRepositoryImplementation implements ApplicantSchoolDataRepositoryInterface
{
    public function __construct(
        private ApplicantSchoolData $applicantSchoolData
    )
    {}

    public function createApplicantSchoolDataRecord($data)
    {
        return $this->applicantSchoolData->create($data);
    }

    public function getApplicantSchoolDataById($id, $relationships = [])
    {
        return $this->applicantSchoolData->with($relationships)->where([
            'id' => $id
        ])->first();
    }

    public function updateApplicantSchoolDataRecord($data, $id)
    {
        return $this->applicantSchoolData->where([
            'id' => $id
        ])->update($data);
    }

}
