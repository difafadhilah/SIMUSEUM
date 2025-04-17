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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai', 50);
            $table->date('tgl_lahir'); // Ubah menjadi tipe data date
            $table->string('jenis_kelamin', 10);
            $table->string('email', 50)->unique(); // Tambahkan constraint unique pada email
            $table->string('jabatan', 25);
            $table->string('no_tlp', 12); // Ubah menjadi string (karena nomor telepon biasanya berupa string)
            $table->text('pesan')->nullable(); // Tambahkan nullable pada pesan
            $table->string('alamat');
            $table->string('avatar')->nullable(); // Tambahkan kolom avatar
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
