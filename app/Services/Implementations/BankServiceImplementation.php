<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\BankRepositoryInterface;
use App\Services\Interfaces\BankServiceInterface;

class BankServiceImplementation implements BankServiceInterface
{
    public function __construct(
        private BankRepositoryInterface $bankRepositoryInterface
    )
    {}
    public function getBanks($relationships = [])
    {
        return $this->bankRepositoryInterface->getBanks();
    }
}
