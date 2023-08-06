<?php

namespace App\Repositories\Implementations;

use App\Models\School;
use App\Repositories\Interfaces\SchoolRepositoryInterface;

class SchoolRepositoryImplementation implements SchoolRepositoryInterface
{
    public function __construct(
        private School $school
    )
    {}

    public function createSchoolRecord($data)
    {
        return $this->school->create($data);
    }
    public function getSchoolById($id, $relationships = [])
    {
        return $this->school->with($relationships)->where([
            'id' => $id
        ])->first();
    }
    public function updateSchoolRecord($data, $id)
    {
        $this->school->where([
            'id' => $id
        ])->update($data);
    }
    public function deleteSchoolRecord($id)
    {
        $this->school->where([
            'id' => $id
        ])->delete();
    }
    public function getSchoolsFiltered($getSchoolFilterOptions, $relationships = [])
    {
        $countryId = $getSchoolFilterOptions['country_id'] ?? null;

        return $this->school->with($relationships)->when($countryId, function ($model, $countryId) {
            $model->where([
                'country_id' => $countryId
            ]);
        })->latest()->get();
    }
}
