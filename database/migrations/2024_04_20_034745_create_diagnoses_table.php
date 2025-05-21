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
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->string('diagnosis_id')->primary();
            $table->string('nama_pengguna');
            $table->integer('age')->default('5');
            $table->bigInteger('kode_pengguna')->unsigned();;
            $table->foreign('kode_pengguna')->references('id')->on('users')->onDelete('cascade');
            $table->string('alamat_pengguna');
            $table->string('kode_penyakit');
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('deseases')->onDelete('cascade');
            $table->double('nilai_akhir');
            $table->json('hasil');
            $table->json('gejala');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
