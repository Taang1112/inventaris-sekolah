<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Barang;
use Illuminate\Support\Facades\Mail; // tambahan
use App\Mail\PeminjamanMail; // tambahan

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::with(['guru','kelas','barang'])->get();
        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        $guru = Guru::all();
        $kelas = Kelas::all();
        $barang = Barang::where('jumlah_tersedia', '>', 0)->get();

        return view('peminjaman.create', compact('guru','kelas','barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'barang_id' => 'required',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date'
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jumlah_pinjam > $barang->jumlah_tersedia) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // Kurangi stok
        $barang->jumlah_tersedia -= $request->jumlah_pinjam;
        $barang->save();

        $peminjaman = Peminjaman::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam'
        ]);

        // =========================
        // KIRIM EMAIL NOTIFIKASI
        // =========================
        Mail::to('admin@gmail.com')->send(new PeminjamanMail($peminjaman));

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = $peminjaman->barang;

        // Tambah stok kembali
        $barang->jumlah_tersedia += $peminjaman->jumlah_pinjam;
        $barang->save();

        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Barang berhasil dikembalikan');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $guru = Guru::all();
        $kelas = Kelas::all();
        $barang = Barang::all();

        return view('peminjaman.edit', compact('peminjaman','guru','kelas','barang'));
    }
}