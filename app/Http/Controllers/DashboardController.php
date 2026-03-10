<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SemuaDataExport;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        
        return view('dashboard', compact(
            'totalBarang', 
            'totalGuru', 
            'totalKelas', 
            'peminjamanAktif'
        ));
    }

    /**
     * Export semua data ke Excel
     */
    public function exportSemuaExcel()
    {
        return Excel::download(new SemuaDataExport, 'laporan_inventaris.xlsx');
    }

    /**
     * Export semua data ke PDF
     */
    public function exportPdfSemua(Request $request)
    {
        // Ambil semua data
        $barang = Barang::all();
        $guru = Guru::all();
        $kelas = Kelas::with('guru')->get();
        $peminjaman = Peminjaman::with(['guru', 'kelas', 'barang'])->get();

        // Cek apakah ada parameter type untuk export per halaman
        $type = $request->get('type');
        
        if ($type) {
            switch ($type) {
                case 'barang':
                    $data = ['barang' => $barang];
                    $view = 'pdf.semua';
                    $filename = 'data-barang.pdf';
                    break;
                case 'guru':
                    $data = ['guru' => $guru];
                    $view = 'pdf.semua';
                    $filename = 'data-guru.pdf';
                    break;
                case 'kelas':
                    $data = ['kelas' => $kelas];
                    $view = 'pdf.semua';
                    $filename = 'data-kelas.pdf';
                    break;
                case 'peminjaman':
                    $data = [
                        'peminjaman' => $peminjaman,
                        'guru' => $guru,
                        'kelas' => $kelas,
                        'barang' => $barang
                    ];
                    $view = 'pdf.semua';
                    $filename = 'data-peminjaman.pdf';
                    break;
                default:
                    $data = [
                        'barang' => $barang,
                        'guru' => $guru,
                        'kelas' => $kelas,
                        'peminjaman' => $peminjaman
                    ];
                    $view = 'pdf.semua';
                    $filename = 'laporan-inventaris.pdf';
            }
        } else {
            // Export semua data
            $data = [
                'barang' => $barang,
                'guru' => $guru,
                'kelas' => $kelas,
                'peminjaman' => $peminjaman
            ];
            $view = 'pdf.semua';
            $filename = 'laporan-inventaris.pdf';
        }

        $pdf = Pdf::loadView($view, $data);
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download($filename);
    }
}