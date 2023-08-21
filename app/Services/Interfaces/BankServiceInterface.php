<?php

namespace App\Services\Interfaces;

interface BankServiceInterface {
    public function getBanks($relationships = []);
}
