<?php

namespace App\Repositories\Implementations;

use App\Models\ApplicantBioData;
use App\Repositories\Interfaces\ApplicantBioDataRepositoryInterface;

class ApplicantBioDataRepositoryImplementation implements ApplicantBioDataRepositoryInterface
{
    public function __construct(
        private ApplicantBioData $applicantBioData
    )
    {}

    public function createApplicantBioDataRecord($data)
    {
        return $this->applicantBioData->create($data);
    }

    public function getApplicantBioDataById($id, $relationships = [])
    {
        return $this->applicantBioData->with($relationships)->where([
            'id' => $id
        ])->first();
    }

    public function updateApplicantBioDataRecord($data, $id)
    {
        return $this->applicantBioData->where([
            'id' => $id
        ])->update($data);
    }

}
