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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->date('check_date');
            $table->enum('status_perawatan', ['diperiksa', 'sudah_diperiksa', 'dirawat', 'selesai'])->default('diperiksa');
            $table->enum('status_pembayaran', ['belum_disetel', 'menunggu_pembayaran', 'menunggu_konfirmasi', 'cancelled', 'selesai'])->default('belum_disetel');
            $table->text('complaint')->nullable();
            $table->text('diagnosis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
