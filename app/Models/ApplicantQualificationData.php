<?php

namespace App\Models;

class ApplicantQualificationData extends AbstractModel
{
    public function qualificationType()
    {
        return $this->belongsTo(QualificationType::class, 'qualification_type_id');
    }
}
