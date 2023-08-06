<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ApplicantBioDataRepositoryInterface;
use App\Repositories\Interfaces\ApplicantRepositoryInterface;
use App\Repositories\Interfaces\ApplicantSchoolDataRepositoryInterface;
use App\Services\Interfaces\ApplicantServiceInterface;
use Illuminate\Support\Facades\DB;

class ApplicantServiceImplementation implements ApplicantServiceInterface
{
    public function __construct(
        private ApplicantRepositoryInterface $applicantRepositoryInterface,
        private ApplicantBioDataRepositoryInterface $applicantBioDataRepositoryInterface,
        private ApplicantSchoolDataRepositoryInterface $applicantSchoolDataRepositoryInterface,
    )
    {}

    public function createApplicantRecord($data)
    {
        return DB::transaction(function () use ($data) {
            $applicant =  $this->applicantRepositoryInterface->createApplicantRecord(
                $data
            );
            
            $this->applicantBioDataRepositoryInterface->createApplicantBioDataRecord([
                'applicant_id' => $applicant->id
            ]);

            $this->applicantSchoolDataRepositoryInterface->createApplicantSchoolDataRecord([
                'applicant_id' => $applicant->id
            ]);

            return $applicant;
        });
    }
    public function updateApplicantRecord($data, $id)
    {
        $this->applicantRepositoryInterface->updateApplicantRecord($data, $id);
    }
    public function getApplicantByEmailAddress($emailAddress, $relationships = [])
    {
        return $this->applicantRepositoryInterface->getApplicantByEmailAddress(
            $emailAddress,
            $relationships
        );
    }
}
