<?php

namespace App\Models;

class ApplicantSchoolData extends AbstractModel
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
