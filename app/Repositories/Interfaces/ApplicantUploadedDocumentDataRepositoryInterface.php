<?php

namespace App\Repositories\Interfaces;

interface ApplicantUploadedDocumentDataRepositoryInterface
{
    public function createApplicantUploadedDocumentDataRecord($data);
    public function getApplicantUploadedDocumentDataById($id, $relationships = []);
    public function updateApplicantUploadedDocumentDataRecord($data, $id);
    public function deleteApplicantUploadedDocumentDataRecord($id);
    public function getApplicantUploadedDocumentDataFiltered(
        $getApplicantUploadedDocumentFilterOptions, $relationships = []
    );
}
