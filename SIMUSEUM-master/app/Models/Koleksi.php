<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = 'koleksis';
    protected $fillable = [
        'no_koleksi',
        'nama_koleksi',
        'jenis_koleksi',
        'ukuran',       // JSON field untuk ukuran
        'deskripsi',
        'asal',
        'keadaan',
        'gambar',
    ];

    protected $casts = [
        'ukuran' => 'array', // Mendefinisikan kolom ukuran sebagai array (JSON)
    ];
}
