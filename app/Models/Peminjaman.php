<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $fillable = [
        'barang_id',
        'guru_id',
        'jumlah_pinjam',
        'tanggal_pinjam',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
