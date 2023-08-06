<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Bangladesh',
                'schools' => [
                    ['name' => 'UNIVERSITY OF DHAKA']
                ]
            ],
            [
                'name' => 'Egypt',
                'schools' => [
                    ['name' => 'AIN SHAM UNIVERSITY'],
                    ['name' => 'SUEZ UNIVERSITY'],
                    ['name' => 'BENI SUIF UNIVERSITY'],
                    ['name' => 'MONUFIA UNIVERSITY'],
                    ['name' => 'MANSOURA UNIVERSITY'],
                    ['name' => 'ALEX UNIVERSIT'],
                ]
            ],
            [
                'name' => 'Greece',
                'schools' => [
                    ['name' => 'NATIONAL AND KAPODISTRIAN UNIVERSITY OF ATHENS']
                ]
            ],
            [
                'name' => 'India',
                'schools' => [
                    ['name' => 'SHARDA UNIVERSITY'],
                    ['name' => 'NOIDA INTERNATIONAL UNIVERSITY'],
                    ['name' => 'Amity University'],
                ]
            ],
            [
                'name' => 'Kenya',
                'schools' => [
                    ['name' => 'UNIVERSITY OF NAIROBI'],
                    ['name' => 'KENYATTA UNIVERSITY'],
                ]
            ],
            [
                'name' => 'Malaysia',
                'schools' => [
                    ['name' => 'UNIVERSITY KEBANGSAN MALAYSIA (UKM)'],
                    ['name' => 'UNIVERSITY OF MALAYA (UM)'],
                    ['name' => 'UNIVERSITY PUTRA MALAYSIA (UPM)'],
                    ['name' => 'UNIVERSITY SAINS MALAYSIA (USM)'],
                    ['name' => 'UNIVERSITY TECHNOLOGY MALAYSIA(UTM)'],
                ]
            ],
            [
                'name' => 'Pakistan',
                'schools' => [
                    ['name' => 'UNIVERSITY OF THE PUNJAB'],
                    ['name' => 'NATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY']
                ]
            ],
            [
                'name' => 'South Africa',
                'schools' => [
                    ['name' => 'UNIVERSITY OF CAPE TOWN'],
                    ['name' => 'UNIVERSITY OF FREE STATE'],
                ]
            ],
            [
                'name' => 'Tanzania',
                'schools' => [
                    ['name' => 'University of Dar es Salaam'],
                    ['name' => 'Nelson Mandela African Institution of Scienceand Technology']
                ]
            ],
            [
                'name' => 'Uganda',
                'schools' => [
                    ['name' => 'MAKERERE UNIVERSITY'],
                    ['name' => 'MBARARA UNIVERSITY OF SCIENCE AND.TECHNOLOGY']
                ]
            ],
            [
                'name' => 'United Kingdom',
                'schools' => [
                    ['name' => 'COVENTRY UNIVERSITY'],
                    ['name' => 'OXFORT BROOKES UNIVERSITY'],
                    ['name' => 'UNIVERSITY OF PORTSMOUTH'],
                ]
            ],
        ];

        DB::transaction(function () use ($countries) {
            foreach ($countries as $country) {
                $countryRecord = Country::create([
                    'name' => $country['name'],
                ]);
                foreach ($country['schools'] as $school) {
                    School::create([
                        'country_id' => $countryRecord->id,
                        'school_name' => $school['name']
                    ]);
                }
            }
        });
    }
}
