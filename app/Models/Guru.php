<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru'; // WAJIB

    protected $primaryKey = 'guru_id'; // WAJIB karena bukan id

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nama_guru',
        'nip',
        'no_hp'
    ];
}