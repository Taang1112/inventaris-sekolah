<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::count();
        $kelas = Kelas::count();
        $peminjaman = Peminjaman::count();

        return view('dashboard', compact('guru', 'kelas', 'peminjaman'));
    }
}