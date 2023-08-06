<?php

namespace App\Services\Interfaces;

interface DocumentTypeServiceInterface
{
    public function createDocumentTypeRecord($data);
    public function updateDocumentTypeRecord($data, $id);
    public function deleteDocumentTypeRecord($id);
    public function getDocumentTypeById($id, $relationships = []);
    public function getDocumentTypes($relationships = []);
}
