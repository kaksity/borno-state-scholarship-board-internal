<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\QualificationTypeRepositoryInterface;
use App\Services\Interfaces\QualificationTypeServiceInterface;

class QualificationTypeServiceImplementation implements QualificationTypeServiceInterface
{
    public function __construct(
        private QualificationTypeRepositoryInterface $qualificationTypeRepositoryInterface
    )
    {}

    public function createQualificationTypeRecord($data)
    {
        return $this->qualificationTypeRepositoryInterface->createQualificationTypeRecord(
            $data
        );
    }

    public function updateQualificationTypeRecord($data, $id)
    {
        $this->qualificationTypeRepositoryInterface->updateQualificationTypeRecord(
            $data,
            $id
        );
    }

    public function deleteQualificationTypeRecord($id)
    {
        $this->qualificationTypeRepositoryInterface->deleteQualificationTypeRecord(
            $id
        );
    }

    public function getQualificationTypeById($id, $relationships = [])
    {
        return $this->qualificationTypeRepositoryInterface->getQualificationTypeById(
            $id,
            $relationships
        );
    }

    public function getQualificationTypes($relationships = [])
    {
        return $this->qualificationTypeRepositoryInterface->getQualificationTypes(
            $relationships
        );
    }

}
