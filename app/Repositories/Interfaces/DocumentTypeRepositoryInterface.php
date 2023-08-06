<?php

namespace App\Repositories\Interfaces;

interface DocumentTypeRepositoryInterface
{
    public function createDocumentTypeRecord($data);
    public function updateDocumentTypeRecord($data, $id);
    public function deleteDocumentTypeRecord($id);
    public function getDocumentTypeById($id, $relationships = []);
    public function getDocumentTypes($relationships = []);
}
