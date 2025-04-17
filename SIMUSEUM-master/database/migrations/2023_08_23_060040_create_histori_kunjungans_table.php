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
        Schema::create('histori_kunjungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kunjungan_petugas_id');
            $table->timestamps();

            $table->foreign('kunjungan_petugas_id')->references('id')->on('kunjungan_petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_kunjungans');
    }
};
