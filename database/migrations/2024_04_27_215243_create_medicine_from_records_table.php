<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicine_from_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medical_record_id');
            $table->foreign('medical_record_id')->references('id')->on('medical_records');
            $table->unsignedInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_from_records');
    }
};
