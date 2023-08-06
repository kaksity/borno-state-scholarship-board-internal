<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['name' => 'Primary School Leaving Certificate'],
            ['name' => 'Secondary School Certificate Examinations'],
            ['name' => 'Bachelors Degree'],
            ['name' => 'Masters'],
            ['name' => 'Doctorate'],
        ];

        DB::transaction(function() use($documentTypes) {
            foreach ($documentTypes as $documentType) {
                DocumentType::create($documentType);
            }
        });
    }
}
