<?php

namespace App\Repositories\Implementations;

use App\Models\Bank;
use App\Repositories\Interfaces\BankRepositoryInterface;

class BankRepositoryImplementation implements BankRepositoryInterface
{
    public function __construct(
        private Bank $bank
    )
    {}

    public function getBanks($relationships = [])
    {
        return $this->bank->with($relationships)->orderBy('name', 'ASC')->get();
    }
}
