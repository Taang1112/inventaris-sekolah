<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $fillable = [
        'guru_id',
        'kelas_id',
        'barang_id',
        'jumlah_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // Relasi
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}