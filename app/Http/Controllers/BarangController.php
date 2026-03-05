<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|max:50|unique:barang,kode_barang',
            'nama_barang' => 'required|max:100',
            'jumlah_total' => 'required|integer|min:0',
            'jumlah_tersedia' => 'required|integer|min:0|lte:jumlah_total',
            'kondisi' => 'required|in:baik,rusak',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|max:50|unique:barang,kode_barang,' . $id . ',barang_id',
            'nama_barang' => 'required|max:100',
            'jumlah_total' => 'required|integer|min:0',
            'jumlah_tersedia' => 'required|integer|min:0|lte:jumlah_total',
            'kondisi' => 'required|in:baik,rusak',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Data barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Data barang berhasil dihapus');
    }
}
