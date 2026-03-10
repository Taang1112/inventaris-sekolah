<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Guru::select(
            'guru_id',
            'nama_guru',
            'nip',
            'no_hp'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Guru',
            'NIP',
            'No HP'
        ];
    }
}