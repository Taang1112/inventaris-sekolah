<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peminjaman::select(
            'peminjaman_id',
            'guru_id',
            'kelas_id',
            'barang_id',
            'jumlah_pinjam',
            'tanggal_pinjam',
            'tanggal_kembali',
            'status'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Guru ID',
            'Kelas ID',
            'Barang ID',
            'Jumlah Pinjam',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status'
        ];
    }
}