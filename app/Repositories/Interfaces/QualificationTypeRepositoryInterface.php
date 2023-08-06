<?php

namespace App\Repositories\Interfaces;

interface QualificationTypeRepositoryInterface
{
    public function createQualificationTypeRecord($data);
    public function updateQualificationTypeRecord($data, $id);
    public function deleteQualificationTypeRecord($id);
    public function getQualificationTypeById($id, $relationships = []);
    public function getQualificationTypes($relationships = []);
}
