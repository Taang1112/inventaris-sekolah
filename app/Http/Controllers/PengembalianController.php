<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman.barang', 'peminjaman.guru')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'dipinjam')->with('barang', 'guru')->get();
        return view('pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,peminjaman_id',
            'tanggal_kembali' => 'required|date',
            'kondisi_kembali' => 'required|in:baik,rusak',
        ]);

        $pengembalian = Pengembalian::create($request->all());
        
        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);
        $peminjaman->update(['status' => 'kembali']);

        if ($request->kondisi_kembali == 'baik') {
            $peminjaman->barang->increment('jumlah_tersedia', $peminjaman->jumlah_pinjam);
        } else {
            // If damaged, you might want to handle it differently, 
            // but for now we'll just not return it to 'tersedia' or handle it based on business rules.
            // Some systems might still return it but mark as damaged. 
            // In the barang table, 'kondisi' is per record, so we'll just not increment 'jumlah_tersedia'.
        }

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan');
    }

    public function exportExcel()
    {
        return Excel::download(new PengembalianExport, 'pengembalian.xlsx');
    }

    public function exportPdf()
    {
        $pengembalian = Pengembalian::with('peminjaman.barang', 'peminjaman.guru')->get();
        $pdf = Pdf::loadView('exports.pengembalian_pdf', compact('pengembalian'));
        return $pdf->download('pengembalian.pdf');
    }
}
