<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::count();
        $kelas = Kelas::count();

        return view('dashboard', compact('guru', 'kelas'));
    }
}