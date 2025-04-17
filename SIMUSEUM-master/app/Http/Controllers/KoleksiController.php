<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koleksis = Koleksi::all();
        return view('dashboard.manajemen-museum.koleksi.index', [
            'koleksi' => $koleksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil koleksi yang ingin ditambahkan ukurannya
        $koleksi = new Koleksi(); // Ganti dengan cara Anda mengambil data koleksi yang sesuai

        // Ambil data ukuran dari koleksi jika sudah ada
        $ukuran = $koleksi->ukuran ?? [];

        return view('dashboard.manajemen-museum.koleksi.create', [
            'ukuran' => $ukuran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_koleksi' => 'required|unique:koleksis',
            'nama_koleksi' => 'required',
            'jenis_koleksi' => 'required',
            'ukuran' => 'required|array',
            'ukuran.panjang' => 'numeric',
            'ukuran.lebar' => 'numeric',
            'ukuran.diameter' => 'numeric',
            'ukuran.tinggi' => 'numeric',
            'deskripsi' => 'required',
            'asal' => 'required',
            'keadaan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'no_koleksi' => 'Nomor koleksi sudah ada, gunakan nomor koleksi yang lain.'
        ]);


        // Buat instance Koleksi dan isi atributnya
        $koleksi = new Koleksi([
            'no_koleksi' => $validatedData['no_koleksi'],
            'nama_koleksi' => $validatedData['nama_koleksi'],
            'jenis_koleksi' => $validatedData['jenis_koleksi'],
            'ukuran' => json_encode($validatedData['ukuran']),
            'deskripsi' => $validatedData['deskripsi'],
            'asal' => $validatedData['asal'],
            'keadaan' => $validatedData['keadaan'],

        ]);



        // Proses unggah dan simpan foto jika ada
        if ($request->hasFile('gambar')) {
            $avatar = $request->file('gambar');
            $koleksiPath = $avatar->store('koleksis', 'public'); // Simpan di direktori 'storage/app/public/avatars'
            // Simpan path foto ke database
            $koleksi->gambar = $koleksiPath;
            $koleksi->save();
        }
        // Redirect dengan pesan sukses
        return redirect('/dashboard-koleksi')->with('success', 'Koleksi berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Koleksi $koleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        return view('dashboard.manajemen-museum.koleksi.edit', [
            'koleksi' => $koleksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $koleksi = Koleksi::findOrFail($id);
        $request->validate([
            'no_koleksi' => 'required',
            'nama_koleksi' => 'required',
            'jenis_koleksi' => 'required',
            'ukuran' => 'required|array',
            'ukuran.panjang' => 'numeric',
            'ukuran.lebar' => 'numeric',
            'ukuran.diameter' => 'numeric',
            'ukuran.tinggi' => 'numeric',
            'deskripsi' => 'required',
            'asal' => 'required',
            'keadaan' => 'required',
        ]);

        // Update data koleksi
        $koleksi->update([
            'no_koleksi' => $request->no_koleksi,
            'nama_koleksi' => $request->nama_koleksi,
            'jenis_koleksi' => $request->jenis_koleksi,
            'ukuran' => json_encode($request->ukuran),
            'deskripsi' => $request->deskripsi,
            'asal' => $request->asal,
            'keadaan' => $request->keadaan,
        ]);

        // Proses unggah dan simpan foto jika ada
        if ($request->hasFile('gambar')) {
            $avatar = $request->file('gambar');
            $koleksiPath = $avatar->store('koleksis', 'public');
            // Simpan path foto ke database
            $koleksi->gambar = $koleksiPath;
            $koleksi->save();
        }

        // Redirect dengan pesan sukses
        return redirect('/dashboard-koleksi')->with('success', 'Koleksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data koleksi
        $koleksi = Koleksi::findOrFail($id);

        if ($koleksi->gambar) {
            Storage::disk('public')->delete($koleksi->gambar);
        }

        $koleksi->delete();
        // Redirect dengan pesan sukses
        return redirect('/dashboard-koleksi')->with('success', 'Koleksi berhasil dihapus.');
    }
}
