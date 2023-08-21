<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            [
                'name' => '9mobile 9Payment Service Bank',
            ],
            [
                'name' => 'Abbey Mortgage Bank',
            ],
            [
                'name' => 'Above Only MFB',
            ],
            [
                'name' => 'Abulesoro MFB',
            ],
            [
                'name' => 'Access Bank',
            ],
            [
                'name' => 'Access Bank (Diamond)',
            ],
            [
                'name' => 'Accion Microfinance Bank',
            ],
            [
                'name' => 'Ahmadu Bello University Microfinance Bank',
            ],
            [
                'name' => 'Airtel Smartcash PSB',
            ],
            [
                'name' => 'AKU Microfinance Bank',
            ],
            [
                'name' => 'ALAT by WEMA',
            ],
            [
                'name' => 'Amegy Microfinance Bank',
            ],
            [
                'name' => 'Amju Unique MFB',
            ],
            [
                'name' => 'AMPERSAND MICROFINANCE BANK',
            ],
            [
                'name' => 'Aramoko MFB',
            ],
            [
                'name' => 'ASO Savings and Loans',
            ],
            [
                'name' => 'Astrapolaris MFB LTD',
            ],
            [
                'name' => 'Bainescredit MFB',
            ],
            [
                'name' => 'Banc Corp Microfinance Bank',
            ],
            [
                'name' => 'Bowen Microfinance Bank',
            ],
            [
                'name' => 'Branch International Financial Services Limited',
            ],
            [
                'name' => 'Carbon',
            ],
            [
                'name' => 'CASHCONNECT MFB',
            ],
            [
                'name' => 'CEMCS Microfinance Bank',
            ],
            [
                'name' => 'Chanelle Microfinance Bank Limited',
            ],
            [
                'name' => 'Chikum Microfinance bank',
            ],
            [
                'name' => 'Citibank Nigeria',
            ],
            [
                'name' => 'Consumer Microfinance Bank',
            ],
            [
                'name' => 'Corestep MFB',
            ],
            [
                'name' => 'Coronation Merchant Bank',
            ],
            [
                'name' => 'County Finance Limited',
            ],
            [
                'name' => 'Crescent MFB',
            ],
            [
                'name' => 'Dot Microfinance Bank',
            ],
            [
                'name' => 'Ecobank Nigeria',
            ],
            [
                'name' => 'Ekimogun MFB',
            ],
            [
                'name' => 'Ekondo Microfinance Bank',
            ],
            [
                'name' => 'Eyowo',
            ],
            [
                'name' => 'Fairmoney Microfinance Bank',
            ],
            [
                'name' => 'Fidelity Bank',
            ],
            [
                'name' => 'Firmus MFB',
            ],
            [
                'name' => 'First Bank of Nigeria',
            ],
            [
                'name' => 'First City Monument Bank',
            ],
            [
                'name' => 'FirstTrust Mortgage Bank Nigeria',
            ],
            [
                'name' => 'FLOURISH MFB',
            ],
            [
                'name' => 'FSDH Merchant Bank Limited',
            ],
            [
                'name' => 'Gateway Mortgage Bank LTD',
            ],
            [
                'name' => 'Globus Bank',
            ],
            [
                'name' => 'GoMoney',
            ],
            [
                'name' => 'Goodnews Microfinance Bank',
            ],
            [
                'name' => 'Greenwich Merchant Bank',
            ],
            [
                'name' => 'Guaranty Trust Bank',
            ],
            [
                'name' => 'Hackman Microfinance Bank',
            ],
            [
                'name' => 'Hasal Microfinance Bank',
            ],
            [
                'name' => 'Heritage Bank',
            ],
            [
                'name' => 'HopePSB',
            ],
            [
                'name' => 'Ibile Microfinance Bank',
            ],
            [
                'name' => 'Ikoyi Osun MFB',
            ],
            [
                'name' => 'Ilaro Poly Microfinance Bank',
            ],
            [
                'name' => 'Imowo MFB',
            ],
            [
                'name' => 'Infinity MFB',
            ],
            [
                'name' => 'Jaiz Bank',
            ],
            [
                'name' => 'Kadpoly MFB',
            ],
            [
                'name' => 'Keystone Bank',
            ],
            [
                'name' => 'Kredi Money MFB LTD',
            ],
            [
                'name' => 'Kuda Bank',
            ],
            [
                'name' => 'Lagos Building Investment Company Plc.',
            ],
            [
                'name' => 'Links MFB',
            ],
            [
                'name' => 'Living Trust Mortgage Bank',
            ],
            [
                'name' => 'Lotus Bank',
            ],
            [
                'name' => 'Mayfair MFB',
            ],
            [
                'name' => 'Mint MFB',
            ],
            [
                'name' => 'Moniepoint MFB',
            ],
            [
                'name' => 'MTN Momo PSB',
            ],
            [
                'name' => 'OPay Digital Services Limited (OPay)',
            ],
            [
                'name' => 'Optimus Bank Limited',
            ],
            [
                'name' => 'Paga',
            ],
            [
                'name' => 'PalmPay',
            ],
            [
                'name' => 'Parallex Bank',
            ],
            [
                'name' => 'Parkway - ReadyCash',
            ],
            [
                'name' => 'Paycom',
            ],
            [
                'name' => 'Peace Microfinance Bank',
            ],
            [
                'name' => 'Personal Trust MFB',
            ],
            [
                'name' => 'Petra Mircofinance Bank Plc',
            ],
            [
                'name' => 'Platinum Mortgage Bank',
            ],
            [
                'name' => 'Polaris Bank',
            ],
            [
                'name' => 'Polyunwana MFB',
            ],
            [
                'name' => 'PremiumTrust Bank',
            ],
            [
                'name' => 'Providus Bank',
            ],
            [
                'name' => 'QuickFund MFB',
            ],
            [
                'name' => 'Rand Merchant Bank',
            ],
            [
                'name' => 'Refuge Mortgage Bank',
            ],
            [
                'name' => 'Rephidim Microfinance Bank',
            ],
            [
                'name' => 'Rigo Microfinance Bank Limited',
            ],
            [
                'name' => 'ROCKSHIELD MICROFINANCE BANK',
            ],
            [
                'name' => 'Rubies MFB',
            ],
            [
                'name' => 'Safe Haven MFB',
            ],
            [
                'name' => 'Safe Haven Microfinance Bank Limited',
            ],
            [
                'name' => 'SAGE GREY FINANCE LIMITED',
            ],
            [
                'name' => 'Shield MFB',
            ],
            [
                'name' => 'Solid Allianze MFB',
            ],
            [
                'name' => 'Solid Rock MFB',
            ],
            [
                'name' => 'Sparkle Microfinance Bank',
            ],
            [
                'name' => 'Stanbic IBTC Bank',
            ],
            [
                'name' => 'Standard Chartered Bank',
            ],
            [
                'name' => 'Stellas MFB',
            ],
            [
                'name' => 'Sterling Bank',
            ],
            [
                'name' => 'Suntrust Bank',
            ],
            [
                'name' => 'Supreme MFB',
            ],
            [
                'name' => 'TAJ Bank',
            ],
            [
                'name' => 'Tanadi Microfinance Bank',
            ],
            [
                'name' => 'Tangerine Money',
            ],
            [
                'name' => 'TCF MFB',
            ],
            [
                'name' => 'Titan Bank',
            ],
            [
                'name' => 'Titan Paystack',
            ],
            [
                'name' => 'U&C Microfinance Bank Ltd (U AND C MFB)',
            ],
            [
                'name' => 'Uhuru MFB',
            ],
            [
                'name' => 'Unaab Microfinance Bank Limited',
            ],
            [
                'name' => 'Unical MFB',
            ],
            [
                'name' => 'Unilag Microfinance Bank',
            ],
            [
                'name' => 'Union Bank of Nigeria',
            ],
            [
                'name' => 'United Bank For Africa',
            ],
            [
                'name' => 'Unity Bank',
            ],
            [
                'name' => 'VFD Microfinance Bank Limited',
            ],
            [
                'name' => 'Waya Microfinance Bank',
            ],
            [
                'name' => 'Wema Bank',
            ],
            [
                'name' => 'Zenith Bank',
            ],
        ];

        DB::transaction(function () use($banks) {
            foreach ($banks as $bank) {
                Bank::create([
                    'name' => $bank['name']
                ]);
            }
        });
    }
}
