<?php

use App\Models\Desease;
use App\Models\Indication;
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
        Schema::create('rules', function (Blueprint $table) {
            $table->bigIncrements('kode_pengetahuan')->primary();
            $table->string('kode_gejala');
            $table->string('kode_penyakit');
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('deseases')->onDelete('cascade');;
            $table->foreign('kode_gejala')->references('kode_gejala')->on('indications');
            $table->double('cf_pakar');
            $table->double('mb_pakar');
            $table->double('md_pakar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
