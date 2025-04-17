<?php

namespace App\Http\Controllers;

use App\Models\HistoriKunjungan;
use App\Models\JadwalKunjungan;
use App\Models\KunjunganPetugas;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class KunjunganPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateStatusSuccess(Request $request, $id)
    {
        $kunjunganPetugas = KunjunganPetugas::findOrFail($id);
        $jadwalKunjungan = JadwalKunjungan::with('pegawai')->get();

        // dd($kunjunganPetugas->id);

        HistoriKunjungan::create([
            'kunjungan_petugas_id' => $kunjunganPetugas->id,
            'jadwalKunjungan' => $jadwalKunjungan 
        ]);
        // Hapus data dari tabel kunjungan_petugas
        $kunjunganPetugas->update([
            'status'=>1
        ]);

        return redirect()->back()->with('success', 'Data kunjungan berhasil dipindahkan ke histori.');
    }

    public function create()
    {

        $pegawai = Pegawai::all();
        $jadwalKunjungan = JadwalKunjungan::all();
        // dd($jadwalKunjungan);
        return view('dashboard.manajemen-kegiatan.kunjungan-petugas.create', [
            'pegawai' => $pegawai,
            'jadwalKunjungan' => $jadwalKunjungan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'jadwal_kunjungan_id' => 'required',
        ]);

        foreach ($request->pegawai_id as $pegawaiId) {
            $model = new KunjunganPetugas();
            $model->jadwal_kunjungan_id = $validatedData['jadwal_kunjungan_id'];
            $model->pegawai_id = $pegawaiId;
            $model->save();
        }

        return redirect('dashboard-jadwal-kunjungan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KunjunganPetugas $kunjunganPetugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KunjunganPetugas $kunjunganPetugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KunjunganPetugas $kunjunganPetugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KunjunganPetugas $kunjunganPetugas)
    {
        //
    }
}
