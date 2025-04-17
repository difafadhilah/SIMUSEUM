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
        Schema::create('museums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('alamat', 50);
            $table->string('no_telp', 12);
            $table->string('email', 50)->unique(); // Tambahkan constraint unique pada email
            $table->string('kontak', 25);
            $table->string('jenis_museum', 25);
            $table->string('nama_pemilik', 50);
            $table->unsignedSmallInteger('jumlah_koleksi'); // Menggunakan tipe data unsignedSmallInteger
            $table->text('visi');
            $table->text('misi');
            $table->date('tanggal_berdiri_peresmian');
            $table->text('sejarah');
            $table->string('sumber_pendanaan', 50);
            $table->string('kepemilikan_tanah', 50);
            $table->decimal('luas_lahan', 8, 2);
            $table->decimal('harga_tiket_masuk', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('museums');
    }
};
