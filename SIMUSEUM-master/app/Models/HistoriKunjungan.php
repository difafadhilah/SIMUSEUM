<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriKunjungan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kunjungan_petugas_id',
        
    ];

    public function kunjunganPetugas()
    {
        return $this->belongsTo(kunjunganPetugas::class, 'kunjungan_petugas_id');
    }

}
