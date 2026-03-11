<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kelas::select(
            'kelas_id',
            'nama_kelas',
            'guru_id'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Kelas',
            'Guru ID'
        ];
    }
}