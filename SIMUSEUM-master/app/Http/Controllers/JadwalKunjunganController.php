<?php

namespace App\Http\Controllers;

use App\Models\JadwalKunjungan;
use App\Models\KunjunganPetugas;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalKunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $sekolahUsers = User::where('role', 'sekolah')->pluck('id');
        $kunjunganPetugas = KunjunganPetugas::with('petugas')->where('status', 0)->get();
        $jadwalKunjungan = JadwalKunjungan::whereIn('user_id', $sekolahUsers)->get();
        return view('dashboard.manajemen-kegiatan.jadwal-kunjungan.index', [
            'jadwalKunjungan' => $jadwalKunjungan,
            'kunjunganPetugas' => $kunjunganPetugas,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $sekolahUsers = User::where('role', 'sekolah')->get(); // Mengambil daftar pengguna dengan peran "sekolah"
        return view('dashboard.manajemen-kegiatan.jadwal-kunjungan.create', [
            'sekolahUsers' => $sekolahUsers,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    // public function store(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'user_id' => 'required|integer',
    //         'pegawai_id' => 'required|integer',
    //         'tgl_kunjungan' => 'required|date',
    //         'jam_mulai' => 'required|date_format:H:i',
    //         'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',

    //     ]);

    //     $jadwalKunjungan = new JadwalKunjungan();
    //     $jadwalKunjungan->user_id = $validatedData['user_id'];
    //     $jadwalKunjungan->pegawai_id = $validatedData['pegawai_id'];
    //     $jadwalKunjungan->tgl_kunjungan = $validatedData['tgl_kunjungan'];
    //     $jadwalKunjungan->jam_mulai = $validatedData['jam_mulai'];
    //     $jadwalKunjungan->jam_selesai = $validatedData['jam_selesai'];

    //     $jadwalKunjungan->save();

    //     // Ambil array ID petugas yang dipilih
    //     $selectedPetugas = $request->input('petugas', []);

    //     // Simpan relasi many-to-many untuk petugas
    //     $jadwalKunjungan->pegawaiKunjungan()->attach($selectedPetugas);

    //     return redirect('dashboard-jadwal-kunjungan');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'tgl_kunjungan' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
            'tgl_kunjungan' => 'Jadwal kunjungan harus diisi hari dan dan setelah hari ini',
            'jam_selesai' => 'Jam selesai hari lebih dari jam mulai',
        ]);

        // Cek apakah jadwal kunjungan dengan tanggal dan jam yang sama sudah ada
        $existingJadwal = JadwalKunjungan::where('tgl_kunjungan', $validatedData['tgl_kunjungan'])
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('jam_mulai', [$validatedData['jam_mulai'], $validatedData['jam_selesai']])
                    ->orWhereBetween('jam_selesai', [$validatedData['jam_mulai'], $validatedData['jam_selesai']])
                    ->orWhere(function ($query) use ($validatedData) {
                        $query->where('jam_mulai', '<=', $validatedData['jam_mulai'])
                            ->where('jam_selesai', '>=', $validatedData['jam_selesai']);
                    });
            })
            ->first();

        if ($existingJadwal) {
            return redirect()->back()->withErrors(['message' => 'Jadwal kunjungan pada tanggal dan jam tersebut sudah ada.'])->withInput();
        }

        // Jika tidak ada konflik, buat jadwal kunjungan baru
        $jadwalKunjungan = new JadwalKunjungan();
        $jadwalKunjungan->user_id = $validatedData['user_id'];
        $jadwalKunjungan->tgl_kunjungan = $validatedData['tgl_kunjungan'];
        $jadwalKunjungan->jam_mulai = $validatedData['jam_mulai'];
        $jadwalKunjungan->jam_selesai = $validatedData['jam_selesai'];
        $jadwalKunjungan->save();

        return redirect('dashboard-jadwal-kunjungan');
    }









    /**
     * Display the specified resource.
     */
    public function show(JadwalKunjungan $jadwalKunjungan)
    {
        //
    }

    /**
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwalKunjungan = JadwalKunjungan::findOrFail($id);
        return view('dashboard.manajemen-kegiatan.jadwal-kunjungan.edit', [
            'jadwalKunjungan' => $jadwalKunjungan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jadwalKunjungan = JadwalKunjungan::findOrFail($id);
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'tgl_kunjungan' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
            'tgl_kunjungan' => 'Jadwal kunjungan harus diisi hari dan dan setelah hari ini'
        ]);

        // Cek apakah ada konflik dengan jadwal kunjungan lain
        $existingJadwal = JadwalKunjungan::where('tgl_kunjungan', $validatedData['tgl_kunjungan'])
            ->where(function ($query) use ($validatedData, $jadwalKunjungan) {
                $query->whereBetween('jam_mulai', [$validatedData['jam_mulai'], $validatedData['jam_selesai']])
                    ->orWhereBetween('jam_selesai', [$validatedData['jam_mulai'], $validatedData['jam_selesai']])
                    ->orWhere(function ($query) use ($validatedData, $jadwalKunjungan) {
                        $query->where('jam_mulai', '<=', $validatedData['jam_mulai'])
                            ->where('jam_selesai', '>=', $validatedData['jam_selesai']);
                    });
            })
            ->where('id', '<>', $jadwalKunjungan->id) // Exclude current record from comparison
            ->first();

        if ($existingJadwal) {
            return redirect()->back()->withErrors(['message' => 'Jadwal kunjungan pada tanggal dan jam tersebut sudah ada.'])->withInput();
        }

        // Update jadwal kunjungan
        $jadwalKunjungan->user_id = $validatedData['user_id'];
        $jadwalKunjungan->tgl_kunjungan = $validatedData['tgl_kunjungan'];
        $jadwalKunjungan->jam_mulai = $validatedData['jam_mulai'];
        $jadwalKunjungan->jam_selesai = $validatedData['jam_selesai'];
        $jadwalKunjungan->save();

        return redirect('dashboard-jadwal-kunjungan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalKunjungan $jadwalKunjungan)
    {
        $jadwalKunjungan->delete();
        return redirect('dashboard-jadwal-kunjungan');
    }
}
