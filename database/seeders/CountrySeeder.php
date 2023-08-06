<?php

namespace Database\Seeders;

use App\Models\Country;
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
            ['name' => 'Nigeria'],
            ['name' => 'China']
        ];

        DB::transaction(function () use ($countries) {
            foreach ($countries as $country) {
                Country::create($country);
            }
        });
    }
}
