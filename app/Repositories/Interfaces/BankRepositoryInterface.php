<?php

namespace App\Repositories\Interfaces;

interface BankRepositoryInterface {
    public function getBanks($relationships = []);
}
