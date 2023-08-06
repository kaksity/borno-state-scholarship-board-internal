<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_qualification_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->index();
            $table->bigInteger('qualification_type_id')->index();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('school_attended');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_qualification_data');
    }
};
