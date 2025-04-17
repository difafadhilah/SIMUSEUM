<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais'; // Nama tabel di database
    protected $fillable = [
        'nama_pegawai',
        'tgl_lahir',
        'jenis_kelamin',
        'email',
        'divisi',
        'no_tlp',
        'pesan',
        'alamat'
    ]; // Kolom yang dapat diisi

    // Relasi pegawai ke divisi
    // public function divisi()
    // {
    //     return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    // }
    
    public function kunjunganPetugas()
    {
        return $this->hasMany(KunjunganPetugas::class);
    }
}
