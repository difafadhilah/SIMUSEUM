<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('dashboard.manajemen-pengguna.pegawai.index', [
            'pegawais' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $divisis = Divisi::all(); // Mengambil semua data divisi
        return view('dashboard.manajemen-pengguna.pegawai.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email',
            'divisi' => 'required',
            'no_tlp' => 'required',
            'pesan' => 'required',
            'alamat' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Jika validasi berhasil, simpan data pegawai ke database
        $pegawai = Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'divisi' => $request->divisi,
            'no_tlp' => $request->no_tlp,
            'pesan' => $request->pesan,
            'alamat' => $request->alamat,
        ]);

        // Proses unggah dan simpan foto jika ada
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public'); // Simpan di direktori 'storage/app/public/avatars'
            // Simpan path foto ke database
            $pegawai->avatar = $avatarPath;
            $pegawai->save();
        }

        return redirect('/dashboard-pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('dashboard.manajemen-pengguna.pegawai.detail', compact('pegawai'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        // $divisis = Divisi::all(); // Ambil semua catatan divisi

        return view('dashboard.manajemen-pengguna.pegawai.edit', [
            'pegawai' => $pegawai,
            // 'divisis' => $divisis
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $request->validate([
            'nama_pegawai' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email',
            'divisi' => 'required',
            'no_tlp' => 'required',
            'pesan' => 'required',
            'alamat' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'divisi' => $request->divisi,
            'no_tlp' => $request->no_tlp,
            'pesan' => $request->pesan,
            'alamat' => $request->alamat,
        ]);

        // Proses unggah dan simpan foto jika ada
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public'); // Simpan di direktori 'storage/app/public/avatars'
            // Simpan path foto ke database
            $pegawai->avatar = $avatarPath;
            $pegawai->save();
        }

        return redirect('/dashboard-pegawai')->with('success', 'Pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Hapus foto jika ada
        if ($pegawai->avatar) {
            Storage::disk('public')->delete($pegawai->avatar);
        }

        $pegawai->delete();

        return redirect('/dashboard-pegawai')->with('delete', 'Pegawai berhasil dihapus');
    }
}
