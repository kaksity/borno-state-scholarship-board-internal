<?php

namespace App\Services\Interfaces;

interface ApplicantUploadedDocumentDataServiceInterface
{
    public function createApplicantUploadedDocumentDataRecord($data);
    public function getApplicantUploadedDocumentDataById($id, $relationships = []);
    public function updateApplicantUploadedDocumentDataRecord($data, $id);
    public function deleteApplicantUploadedDocumentDataRecord($id);
    public function getApplicantUploadedDocumentDataFiltered(
        $getApplicantUploadedDocumentFilterOptions,
        $relationships = []
    );
}
