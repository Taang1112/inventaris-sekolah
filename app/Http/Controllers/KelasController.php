<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect()->route('kelas.index');
    }

    public function exportExcel()
    {
        return Excel::download(new KelasExport, 'kelas.xlsx');
    }

    public function exportPdf()
    {
        $kelas = Kelas::with('guru')->get();
        $pdf = Pdf::loadView('exports.kelas_pdf', compact('kelas'));
        return $pdf->download('kelas.pdf');
    }
}