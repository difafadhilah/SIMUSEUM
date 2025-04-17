<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\Feedback;
use App\Models\Koleksi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all();
        $pegawai = Pegawai::all();
        $koleksi = Koleksi::orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.index', [
            'koleksi' => $koleksi,
            'pegawai' => $pegawai,
            'feedback' => $feedback,
        ]);
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function koleksi()
    {
        $koleksi = Koleksi::orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.koleksi.index', [
            'koleksi' => $koleksi,
        ]);
    }

    public function showKoleksiDetail($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        return view('frontend.koleksi.koleksi-detail', compact('koleksi'));
    }

    public function bukutamu()
    {
        return view('frontend.bukutamu');
    }

    public function store(Request $request)
{
    $messages = [
        'tanggal.required' => 'Tanggal harus diisi.',
        'tanggal.date' => 'Tanggal harus dalam format yang benar.',
        'tanggal.after_or_equal' => 'Tanggal harus sama dengan atau setelah hari ini.',
        'nama.required' => 'Nama tidak boleh kosong.',
        'asal.required' => 'Asal tidak boleh kosong.',
        'pekerjaan.required' => 'Pekerjaan tidak boleh kosong.',
        'usia.required' => 'Usia tidak boleh kosong.',
        'kesan.required' => 'Kesan tidak boleh kosong.',
        'pesan.required' => 'Pesan tidak boleh kosong.',
    ];

    $request->validate([
        'tanggal' => 'required|date|after_or_equal:today',
        'nama' => 'required',
        'asal' => 'required',
        'pekerjaan' => 'required',
        'usia' => 'required',
        'kesan' => 'required',
        'pesan' => 'required',
    ], $messages);

    // Simpan data buku tamu ke dalam basis data dengan created_at yang sesuai
    BukuTamu::create([
        'tanggal' => $request->tanggal,
        'nama' => $request->nama,
        'asal' => $request->asal,
        'pekerjaan' => $request->pekerjaan,
        'usia' => $request->usia,
        'kesan' => $request->kesan,
        'pesan' => $request->pesan,
        'created_at' => now(), // Mengatur nilai created_at menjadi saat ini
        // Simpan atribut lainnya sesuai kebutuhan
    ]);

    return redirect('/')
        ->with('success', 'Terimakasih sudah berkunjung!');
}


    public function visiMisi(){
        return view('frontend.visi-misi');
    }

    public function sejarah(){
        return view('frontend.sejarah');
    }

    public function kontak(){
        return view('frontend.kontak');
    }
    
}
