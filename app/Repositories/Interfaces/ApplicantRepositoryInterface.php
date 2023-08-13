<?php

namespace App\Repositories\Interfaces;

interface ApplicantRepositoryInterface
{
    public function createApplicantRecord($data);
    public function updateApplicantRecord($data, $id);
    public function getApplicantById($id, $relationships = []);
    public function getApplicantsFiltered($getApplicantsFilterOptions, $relationships = []);
    public function getApplicantByEmailAddress($emailAddress, $relationships = []);
}
