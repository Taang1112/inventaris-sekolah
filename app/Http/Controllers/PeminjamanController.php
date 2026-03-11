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
        $peminjaman = Peminjaman::with(['guru','kelas','barang'])->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $guru = Guru::all();
        $kelas = Kelas::all();
        $barang = Barang::all();

        return view('peminjaman.create', compact('guru','kelas','barang'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'barang_id' => 'required',
            'jumlah_pinjam' => 'required|integer|min:1'
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if($barang->jumlah_tersedia < $request->jumlah_pinjam){
            return redirect()->back()->with('error','Stok barang tidak cukup');
        }

        Peminjaman::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam'
        ]);

        // =========================
        // KIRIM EMAIL NOTIFIKASI
        // =========================
        Mail::to('admin@gmail.com')->send(new PeminjamanMail($peminjaman));

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan');
        $barang->jumlah_tersedia -= $request->jumlah_pinjam;
        $barang->save();

        return redirect()->route('peminjaman.index')->with('success','Barang berhasil dipinjam');
    }


    public function kembalikan($id)
    {

        $peminjaman = Peminjaman::findOrFail($id);

        if($peminjaman->status == 'dikembalikan'){
            return redirect()->back()->with('error','Barang sudah dikembalikan');
        }

        $barang = Barang::findOrFail($peminjaman->barang_id);

        $barang->jumlah_tersedia += $peminjaman->jumlah_pinjam;
        $barang->save();

        $peminjaman->update([
            'tanggal_kembali' => now(),
            'status' => 'dikembalikan'
        ]);

        return redirect()->route('peminjaman.index')->with('success','Barang berhasil dikembalikan');
    }


    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $guru = Guru::all();
        $kelas = Kelas::all();
        $barang = Barang::all();

        return view('peminjaman.edit', compact('peminjaman','guru','kelas','barang'));
    }

        return view('peminjaman.edit', compact('peminjaman','guru','kelas','barang'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'barang_id' => 'required',
            'jumlah_pinjam' => 'required|integer|min:1'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $request->jumlah_pinjam
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success','Data peminjaman berhasil diupdate');
    }

}