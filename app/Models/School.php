<?php

namespace App\Models;

class School extends AbstractModel
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
