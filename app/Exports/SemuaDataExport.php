<?php

namespace App\Exports;

use App\Models\Barang;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SemuaDataExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [
            new BarangSheet(),
            new GuruSheet(),
            new KelasSheet(),
            new PeminjamanSheet(),
        ];

        return $sheets;
    }
}

class BarangSheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Barang::all();
    }

    public function title(): string
    {
        return 'Data Barang';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang',
            'Nama Barang',
            'Jumlah Total',
            'Jumlah Tersedia',
            'Kondisi',
            'Created At',
            'Updated At'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4F46E5']]],
        ];
    }
}

class GuruSheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Guru::all();
    }

    public function title(): string
    {
        return 'Data Guru';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Guru',
            'NIP',
            'No HP',
            'Created At',
            'Updated At'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4F46E5']]],
        ];
    }
}

class KelasSheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Kelas::with('guru')->get()->map(function($kelas) {
            return [
                'kelas_id' => $kelas->kelas_id,
                'nama_kelas' => $kelas->nama_kelas,
                'guru_id' => $kelas->guru_id,
                'nama_wali' => $kelas->guru->nama_guru ?? '-',
                'created_at' => $kelas->created_at,
                'updated_at' => $kelas->updated_at,
            ];
        });
    }

    public function title(): string
    {
        return 'Data Kelas';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Kelas',
            'Guru ID',
            'Nama Wali Kelas',
            'Created At',
            'Updated At'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4F46E5']]],
        ];
    }
}

class PeminjamanSheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Peminjaman::with(['guru', 'kelas', 'barang'])->get()->map(function($p) {
            return [
                'peminjaman_id' => $p->peminjaman_id,
                'guru' => $p->guru->nama_guru ?? $p->guru_id,
                'kelas' => $p->kelas->nama_kelas ?? $p->kelas_id,
                'barang' => $p->barang->nama_barang ?? $p->barang_id,
                'jumlah_pinjam' => $p->jumlah_pinjam,
                'tanggal_pinjam' => $p->tanggal_pinjam,
                'status' => $p->status,
                'created_at' => $p->created_at,
                'updated_at' => $p->updated_at,
            ];
        });
    }

    public function title(): string
    {
        return 'Data Peminjaman';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Guru',
            'Kelas',
            'Barang',
            'Jumlah Pinjam',
            'Tanggal Pinjam',
            'Status',
            'Created At',
            'Updated At'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4F46E5']]],
        ];
    }
}