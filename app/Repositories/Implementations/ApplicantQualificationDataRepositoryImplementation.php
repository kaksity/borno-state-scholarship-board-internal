<?php

namespace App\Repositories\Implementations;

use App\Models\ApplicantQualificationData;
use App\Repositories\Interfaces\ApplicantQualificationDataRepositoryInterface;

class ApplicantQualificationDataRepositoryImplementation implements ApplicantQualificationDataRepositoryInterface
{
    public function __construct(
        private ApplicantQualificationData $applicantQualificationData
    )
    {}

    public function createApplicantQualificationDataRecord($data)
    {
        return $this->applicantQualificationData->create($data);
    }

    public function deleteApplicantQualificationDataRecord($id)
    {
        $this->applicantQualificationData->where([
            'id' => $id
        ])->delete();
    }
    public function getApplicantQualificationDataById($id, $relationships = [])
    {
        return $this->applicantQualificationData->with($relationships)->where([
            'id' => $id
        ])->first();
    }

    public function updateApplicantQualificationDataRecord($data, $id)
    {
        $this->applicantQualificationData->where([
            'id' => $id
        ])->update($data);
    }

    public function getApplicantQualificationDataFiltered($getApplicantQualificationFilterOptions, $relationships = [])
    {
        $applicantId = $getApplicantQualificationFilterOptions['applicant_id'] ?? null;
        $qualificationTypeId = $getApplicantQualificationFilterOptions['qualification_type_id'] ?? null;

        return $this->applicantQualificationData->with(
            $relationships
        )->when($applicantId, function($model, $applicantId) {
            $model->where([
                'applicant_id' => $applicantId
            ]);
        })->when($qualificationTypeId, function ($model, $qualificationTypeId) {
            $model->where([
                'qualification_type_id' => $qualificationTypeId
            ]);
        })->orderBy('from_date', 'ASC')->get();
    }
}
