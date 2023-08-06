<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\LgaRepositoryInterface;
use App\Services\Interfaces\LgaServiceInterface;

class LgaServiceImplementation implements LgaServiceInterface
{
    public function __construct(
        private LgaRepositoryInterface $lgaRepositoryInterface
    )
    {}
    public function getLgas($relationships = [])
    {
        return $this->lgaRepositoryInterface->getLgas();
    }
}
