<?php

namespace App\Services\Interfaces;

interface RemitaServiceInterface
{
    public function initiatePayment($options);
    public function getRemitaConfigurations();
    public function generateRemitaHash($options, $payment = true);
}
