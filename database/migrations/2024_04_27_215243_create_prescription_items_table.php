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
        Schema::create('prescription_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medical_record_id');
            $table->foreign('medical_record_id')->references('id')->on('medical_records');
            $table->unsignedInteger('inventory_items_id');
            $table->foreign('inventory_items_id')->references('id')->on('inventory_items');
            $table->integer('quantity');
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
