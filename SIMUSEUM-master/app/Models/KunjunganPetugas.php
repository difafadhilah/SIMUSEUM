<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganPetugas extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function jadwalKunjungan()
    {
        return $this->belongsTo(JadwalKunjungan::class, 'jadwal_kunjungan_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

}
