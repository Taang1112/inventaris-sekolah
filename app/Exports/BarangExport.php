<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Barang::select(
            'barang_id',
            'kode_barang',
            'nama_barang',
            'jumlah_total',
            'jumlah_tersedia',
            'kondisi'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang',
            'Nama Barang',
            'Jumlah Total',
            'Jumlah Tersedia',
            'Kondisi'
        ];
    }
}