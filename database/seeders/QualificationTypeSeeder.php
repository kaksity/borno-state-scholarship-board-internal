<?php

namespace Database\Seeders;

use App\Models\QualificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualificationTypes = [
            ['name' => 'Primary School Leaving Certificate'],
            ['name' => 'Secondary School Certificate Examinations'],
            ['name' => 'Bachelors Degree'],
            ['name' => 'Masters'],
            ['name' => 'Doctorate'],
        ];

        DB::transaction(function() use($qualificationTypes) {
            foreach ($qualificationTypes as $qualificationType) {
                QualificationType::create($qualificationType);
            }
        });
    }
}
