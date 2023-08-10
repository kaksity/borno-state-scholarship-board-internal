<?php

namespace App\Services\Interfaces;

interface AdminServiceInterface
{
    public function createAdminRecord($data);
    public function updateAdminRecord($data, $id);
    public function getAdminByEmailAddress($emailAddress, $relationships = []);
}
