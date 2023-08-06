<?php

namespace App\Repositories\Interfaces;

interface ApplicantPaymentDataRepositoryInterface
{
    public function createApplicantPaymentDataRecord($data);
    public function getApplicantPaymentDataById($id, $relationships = []);
    public function getApplicantPaymentDataByReference($reference, $relationships = []);
    public function updateApplicantPaymentDataRecord($data, $id);
    public function deleteApplicantPaymentDataRecord($id);
    public function getApplicantPaymentDataFiltered($getApplicantPaymentFilterOptions, $relationships = []);
}
