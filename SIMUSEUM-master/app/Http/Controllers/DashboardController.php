<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\HistoriKunjungan;
use App\Models\JadwalKunjungan;
use App\Models\Koleksi;
use App\Models\KunjunganPetugas;
use App\Models\Museum;
use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user(); // Mendapatkan data user yang sedang login
        $historiKunjunganQuery = HistoriKunjungan::with(['kunjunganPetugas.jadwalKunjungan']);

        if ($user->role === 'superadmin' || $user->role === 'admin') {
            // Jika pengguna memiliki peran superadmin atau admin, ambil semua data histori kunjungan
            $historiKunjungan = $historiKunjunganQuery->get();
        } else {
            // Jika bukan superadmin atau admin, ambil data histori kunjungan berdasarkan user_id
            $historiKunjungan = $historiKunjunganQuery->whereHas('kunjunganPetugas.jadwalKunjungan', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        }


        $totalPegawai = Pegawai::count();
        $totalPengguna = User::count();
        $totalJadwal = JadwalKunjungan::count();
        $totalKoleksi = Koleksi::count();

        $bukutamu = BukuTamu::orderBy('created_at', 'desc')->paginate(10);

        $totalTamu = BukuTamu::count();
        $bukutamu = BukuTamu::orderBy('created_at', 'desc')->paginate(10);

        $adminCount = User::where('role', 'admin')->count();
        $currentYear = Carbon::now()->year;

        $bukuTamuCounts = BukuTamu::getAllBukuTamaByCreatedAt();

        return view('dashboard.index', [
            'totalPegawai' => $totalPegawai,
            'totalPengguna' => $totalPengguna,
            'totalJadwal' => $totalJadwal,
            'totalKoleksi' => $totalKoleksi,
            'historiKunjungan' => $historiKunjungan,
            'totalTamu' => $totalTamu,
            'bukutamu' => $bukutamu,
            'adminCount' => $adminCount,
            'bukuTamuCounts' => $bukuTamuCounts,

        ]);
    }

    public function filterKunjungan(Request $request)
    {
        $user = Auth::user();
        $historiKunjunganQuery = HistoriKunjungan::with(['kunjunganPetugas.jadwalKunjungan']);

        if ($user->role === 'superadmin' || $user->role === 'admin') {
            $historiKunjungan = $historiKunjunganQuery->get();
        } else {
            $historiKunjungan = $historiKunjunganQuery->whereHas('kunjunganPetugas.jadwalKunjungan', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        }

        $filterType = $request->input('filter_type', 'minggu');
        $bukutamuQuery = BukuTamu::query();

        if ($filterType === 'minggu') {
            $bukutamuQuery->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filterType === 'bulan') {
            $bukutamuQuery->whereBetween('tanggal', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($filterType === 'tahun') {
            $bukutamuQuery->whereBetween('tanggal', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }

        $bukutamu = $bukutamuQuery->get();

        return view('dashboard.index', [
            'historiKunjungan' => $historiKunjungan,
            'bukutamu' => $bukutamu,
        ]);
    }

    public function profileMuseum()
    {

        $user = auth()->user(); // Mengambil informasi pengguna yang sedang masuk
        $museum = Museum::all();
        return view('dashboard.profile.index', [
            'user' => $user,
            'museum' => $museum // Mengirimkan informasi pengguna ke tampilan
        ]);
    }
}
