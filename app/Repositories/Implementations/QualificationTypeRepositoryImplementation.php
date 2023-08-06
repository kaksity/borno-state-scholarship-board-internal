<?php

namespace App\Repositories\Implementations;

use App\Models\QualificationType;
use App\Repositories\Interfaces\QualificationTypeRepositoryInterface;

class QualificationTypeRepositoryImplementation implements QualificationTypeRepositoryInterface
{
    public function __construct(
        private QualificationType $qualificationType
    )
    {}

    public function createQualificationTypeRecord($data)
    {
        return $this->qualificationType->create($data);
    }

    public function updateQualificationTypeRecord($data, $id)
    {
        $this->qualificationType->where([
            'id' => $id
        ])->update($data);
    }

    public function deleteQualificationTypeRecord($id)
    {
        $this->qualificationType->where([
            'id' => $id
        ])->delete();
    }
    public function getQualificationTypeById($id, $relationships = [])
    {
        return $this->qualificationType->with($relationships)->where([
            'id' => $id
        ])->first();
    }

    public function getQualificationTypes($relationships = [])
    {
        return $this->qualificationType->with($relationships)->orderBy('name', 'ASC')->get();
    }
}
