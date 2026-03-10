<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('guru')->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());
        return redirect()->route('kelas.index');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('kelas.edit', compact('kelas','guru'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');
    }

    public function exportExcel()
{
    return Excel::download(new BarangExport, 'barang.xlsx');
}

    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect()->route('kelas.index');
    }
}