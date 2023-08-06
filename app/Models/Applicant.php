<?php

namespace App\Models;

class Applicant extends AbstractAuthenticatableModel
{
    protected $guard = 'applicant';

    public function applicantBioData()
    {
        return $this->hasOne(ApplicantBioData::class, 'applicant_id');
    }

    public function applicantSchoolData()
    {
        return $this->hasOne(ApplicantSchoolData::class, 'applicant_id');
    }

    public function applicantQualificationData()
    {
        return $this->hasMany(ApplicantQualificationData::class, 'applicant_id');
    }

    public function applicantUploadedDocumentData()
    {
        return $this->hasMany(ApplicantUploadedDocumentData::class, 'applicant_id');
    }
}

