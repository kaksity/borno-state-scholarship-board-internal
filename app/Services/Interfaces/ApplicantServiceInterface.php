<?php

namespace App\Services\Interfaces;

interface ApplicantServiceInterface
{
    public function createApplicantRecord($data);
    public function updateApplicantRecord($data, $id);
    public function getApplicantByEmailAddress($emailAddress, $relationships = []);
}
