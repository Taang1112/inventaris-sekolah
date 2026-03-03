<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|unique:guru,nip',
            'no_hp' => 'nullable'
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|unique:guru,nip,'.$id,
            'no_hp' => 'nullable'
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil dihapus');
    }
}