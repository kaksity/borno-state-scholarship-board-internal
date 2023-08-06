<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\SchoolRepositoryInterface;
use App\Services\Interfaces\SchoolServiceInterface;

class SchoolServiceImplementation implements SchoolServiceInterface
{
    public function __construct(
        private SchoolRepositoryInterface $schoolRepositoryInterface
    )
    {}

    public function createSchoolRecord($data)
    {
        return $this->schoolRepositoryInterface->createSchoolRecord(
            $data
        );
    }

    public function getSchoolById($id, $relationships = [])
    {
        return $this->schoolRepositoryInterface->getSchoolById(
            $id,
            $relationships
        );
    }

    public function updateSchoolRecord($data, $id)
    {
        $this->schoolRepositoryInterface->updateSchoolRecord(
            $data,
            $id
        );
    }

    public function deleteSchoolRecord($id)
    {
        $this->schoolRepositoryInterface->deleteSchoolRecord(
            $id
        );
    }

    public function getSchoolsFiltered($getSchoolFilterOptions, $relationships = [])
    {
        return $this->schoolRepositoryInterface->getSchoolsFiltered(
            $getSchoolFilterOptions,
            $relationships
        );
    }

}
