<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\DocumentTypeRepositoryInterface;
use App\Services\Interfaces\DocumentTypeServiceInterface;

class DocumentTypeServiceImplementation implements DocumentTypeServiceInterface
{
    public function __construct(
        private DocumentTypeRepositoryInterface $documentTypeRepositoryInterface
    )
    {}

    public function createDocumentTypeRecord($data)
    {
        return $this->documentTypeRepositoryInterface->createDocumentTypeRecord(
            $data
        );
    }

    public function updateDocumentTypeRecord($data, $id)
    {
        $this->documentTypeRepositoryInterface->updateDocumentTypeRecord(
            $data,
            $id
        );
    }

    public function deleteDocumentTypeRecord($id)
    {
        $this->documentTypeRepositoryInterface->deleteDocumentTypeRecord(
            $id
        );
    }

    public function getDocumentTypeById($id, $relationships = [])
    {
        return $this->documentTypeRepositoryInterface->getDocumentTypeById(
            $id,
            $relationships
        );
    }

    public function getDocumentTypes($relationships = [])
    {
        return $this->documentTypeRepositoryInterface->getDocumentTypes(
            $relationships
        );
    }

}
