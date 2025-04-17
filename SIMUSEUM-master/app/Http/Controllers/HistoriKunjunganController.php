<?php

namespace App\Http\Controllers;

use App\Models\HistoriKunjungan;
use App\Models\KunjunganPetugas;
use Illuminate\Http\Request;

class HistoriKunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $historiKunjungan = HistoriKunjungan::all(); // Atau sesuaikan dengan query yang Anda butuhkan

        return view('dashboard.manajemen-kegiatan.histori-kunjungan.index', [
            'historiKunjungan' => $historiKunjungan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createHistoriFromKunjungan()
    {
        $kunjunganPetugas = KunjunganPetugas::all();

        foreach ($kunjunganPetugas as $kunjungan) {
            dd($kunjungan);
            HistoriKunjungan::create([
                'kunjungan_petugas_id' => $kunjungan->id,
            ]);
        }

        return response()->json(['message' => 'Histori kunjungan berhasil dibuat'], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        
        $kunjungan_petugas_id = KunjunganPetugas::find($id);
        // dd($kunjungan_id);
        HistoriKunjungan::create([
            'kunjungan_petugas_id'=> $kunjungan_petugas_id
        ]);

        return view('dasbaord.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoriKunjungan $historiKunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoriKunjungan $historiKunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoriKunjungan $historiKunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoriKunjungan $historiKunjungan)
    {
        //
    }
}
