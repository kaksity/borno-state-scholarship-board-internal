<?php

namespace App\Repositories\Implementations;

use App\Models\ApplicantBankData;
use App\Repositories\Interfaces\ApplicantBankDataRepositoryInterface;

class ApplicantBankDataRepositoryImplementation implements ApplicantBankDataRepositoryInterface
{
    public function __construct(
        private ApplicantBankData $applicantBankData
    )
    {}

    public function createApplicantBankDataRecord($data)
    {
        return $this->applicantBankData->create($data);
    }

    public function deleteApplicantBankDataRecord($id)
    {
        $this->applicantBankData->where([
            'id' => $id
        ])->delete();
    }
    public function getApplicantBankDataById($id, $relationships = [])
    {
        return $this->applicantBankData->with($relationships)->where([
            'id' => $id
        ])->first();
    }

    public function updateApplicantBankDataRecord($data, $id)
    {
        $this->applicantBankData->where([
            'id' => $id
        ])->update($data);
    }

    public function getApplicantBankDataFiltered(
        $getApplicantBankFilterOptions,
        $relationships = []
    )
    {
        $applicantId = $getApplicantBankFilterOptions['applicant_id'] ?? null;
        $bankId = $getApplicantBankFilterOptions['bank_id'] ?? null;

        return $this->applicantBankData->with(
            $relationships
        )->when($applicantId, function($model, $applicantId) {
            $model->where([
                'applicant_id' => $applicantId
            ]);
        })->when($bankId, function ($model, $bankId) {
            $model->where([
                'bank_id' => $bankId
            ]);
        })->get();
    }
}
