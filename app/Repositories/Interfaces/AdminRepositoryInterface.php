<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface
{
    public function createAdminRecord($data);
    public function updateAdminRecord($data, $id);
    public function getAdminByEmailAddress($emailAddress, $relationships = []);
}
