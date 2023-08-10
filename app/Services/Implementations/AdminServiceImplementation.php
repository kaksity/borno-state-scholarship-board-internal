<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Services\Interfaces\AdminServiceInterface;

class AdminServiceImplementation implements AdminServiceInterface
{
    public function __construct(
        private AdminRepositoryInterface $adminRepositoryInterface
    )
    {}

    public function createAdminRecord($data)
    {
        return $this->adminRepositoryInterface->createAdminRecord(
            $data
        );
    }

    public function updateAdminRecord($data, $id)
    {
        $this->adminRepositoryInterface->updateAdminRecord(
            $data,
            $id
        );
    }

    public function getAdminByEmailAddress($emailAddress, $relationships = [])
    {
        return $this->adminRepositoryInterface->getAdminByEmailAddress(
            $emailAddress,
            $relationships
        );
    }
}
