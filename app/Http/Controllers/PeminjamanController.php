<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Barang;

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
            'jumlah_pinjam' => 'required|numeric'
        ]);

        $barang = Barang::find($request->barang_id);

        // cek stok
        if($barang->stok < $request->jumlah_pinjam){
            return redirect()->back()->with('error','Stok barang tidak cukup');
        }

        // simpan peminjaman
        Peminjaman::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam'
        ]);

        // kurangi stok
        $barang->stok -= $request->jumlah_pinjam;
        $barang->save();

        return redirect()->route('peminjaman.index')->with('success','Barang berhasil dipinjam');
    }


    public function kembalikan($id)
    {

        $peminjaman = Peminjaman::findOrFail($id);

        if($peminjaman->status == 'dikembalikan'){
            return redirect()->back()->with('error','Barang sudah dikembalikan');
        }

        $barang = Barang::find($peminjaman->barang_id);

        // tambah stok kembali
        $barang->stok += $peminjaman->jumlah_pinjam;
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

}