<?php

namespace App\Repositories\Implementations;

use App\Models\Lga;
use App\Repositories\Interfaces\LgaRepositoryInterface;

class LgaRepositoryImplementation implements LgaRepositoryInterface
{
    public function __construct(
        private Lga $lga
    )
    {
        
    }
    public function getLgas($relationships = [])
    {
        return $this->lga->orderBy('name', 'ASC')->get();
    }
}
