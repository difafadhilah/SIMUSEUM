<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisis'; // Nama tabel di database
    protected $fillable = ['nama_divisi']; // Kolom yang dapat diisi

    // Relasi pegawai ke divisi (jika ada)
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'divisi_id', 'id');
    }
}
