<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('lga')->nullable();
            $table->string('nin')->nullable();
            $table->string('type')->nullable();
            $table->string('course')->nullable();
            $table->string('primary')->nullable();
            $table->string('secondary')->nullable();
            $table->string('under')->nullable();
            $table->string('msc')->nullable();
            $table->string('session')->nullable();
            $table->string('status')->nullable()->default('Inprogress');
            $table->string('fileprimary')->nullable()->default('none');
            $table->string('filesecondary')->nullable()->default('none');
            $table->string('fileunder')->nullable()->default('none');
            $table->string('filemsc')->nullable()->default('none');
            $table->string('fileindigine')->nullable()->default('none');
            $table->string('filenin')->nullable()->default('none');
            $table->string('json')->nullable()->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
