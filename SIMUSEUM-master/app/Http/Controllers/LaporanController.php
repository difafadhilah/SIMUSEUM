<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\HistoriKunjungan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        $query = Bukutamu::query();

        if ($request->has('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->has('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $bukutamu = $query->get();

        $tamu = BukuTamu::all();
        return view('dashboard.laporan.buku-tamu', [
            'bukutamu' => $tamu,
            'bukutamu' => $bukutamu
        ]);
    }

    public function showKunjungan(Request $request)
    {
        $query = HistoriKunjungan::query();

        if ($request->has('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->has('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $kunjungan = $query->get();

        $historiKunjungan = HistoriKunjungan::all();
        return view('dashboard.laporan.kunjungan', [
            'kunjungan' => $kunjungan,
            'historiKunjungan' => $historiKunjungan
        ]);
    }
}
