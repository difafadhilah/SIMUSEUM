<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKunjungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tgl_kunjungan',
        'jam_mulai',
        'jam_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    

}
