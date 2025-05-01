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
        Schema::create('deseases', function (Blueprint $table) {
            $table->string('kode_penyakit')->primary();
            $table->string('nama_penyakit');
            $table->text('detail_penyakit');
            // $table->text('solusi_penyakit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deseases');
    }
};
