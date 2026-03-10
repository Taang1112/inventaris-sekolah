<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['barang', 'guru'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Barang::where('jumlah_tersedia', '>', 0)->get();
        $guru = Guru::all();
        return view('peminjaman.create', compact('barang', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,barang_id',
            'guru_id' => 'required|exists:guru,guru_id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        if ($barang->jumlah_tersedia < $request->jumlah_pinjam) {
            return back()->withErrors(['jumlah_pinjam' => 'Stok tidak mencukupi']);
        }

        Peminjaman::create($request->all());

        $barang->decrement('jumlah_tersedia', $request->jumlah_pinjam);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function exportExcel()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

    public function exportPdf()
    {
        $peminjaman = Peminjaman::with(['barang', 'guru'])->get();
        $pdf = Pdf::loadView('exports.peminjaman_pdf', compact('peminjaman'));
        return $pdf->download('peminjaman.pdf');
    }
}
