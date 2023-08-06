<?php

namespace App\Services\Interfaces;

interface QualificationTypeServiceInterface
{
    public function createQualificationTypeRecord($data);
    public function updateQualificationTypeRecord($data, $id);
    public function deleteQualificationTypeRecord($id);
    public function getQualificationTypeById($id, $relationships = []);
    public function getQualificationTypes($relationships = []);
}
