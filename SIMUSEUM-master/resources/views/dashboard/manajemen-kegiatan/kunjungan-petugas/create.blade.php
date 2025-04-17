@extends('dashboard.layouts.main')
@section('title', 'Tambah Kunjungan Petugas')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kunjungan Petugas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kunjungan Petugas</li>
                    </ol>
                </div>
            </div>
            <!-- Menampilkan pesan error jika validasi gagal -->
            @if ($errors->any())
                <div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-danger alert-sm rounded-0">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row text-align-center">
                <div class="col-md-12 mx-auto">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Kunjungan Petugas</h3>
                        </div>
                        <form role="form" action="/dashboard-kunjungan-petugas" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jadwal_kunjungan_id" class="col-sm-2 col-form-label">Jadwal
                                        Kunjungan</label>
                                    <div class="col-sm-10">

                                        <select name="jadwal_kunjungan_id" class="form-control">
                                            @foreach ($jadwalKunjungan as $item)
                                                @php
                                                    $selectedDates = [];
                                                    $tanggalKunjungan = date('d-m-Y', strtotime($item->tgl_kunjungan));
                                                    $jamMulai = date('H:i', strtotime($item->jam_mulai));
                                                    $jamSelesai = date('H:i', strtotime($item->jam_selesai));
                                                    
                                                    // Ambil tanggal kunjungan yang telah diinputkan (misal dari form)
                                                    $tanggalInput = date("Y/m/d");
                                                    
                                                    // Konversi tanggal kunjungan ke dalam format yang bisa dibandingkan
                                                    $tanggalKunjunganTimestamp = strtotime($tanggalKunjungan);
                                                    $tanggalInputTimestamp = strtotime($tanggalInput);
                                                    
                                                    // Jika tanggal kunjungan telah lewat dari tanggal input, jangan tampilkan opsi
                                                    if ($tanggalKunjunganTimestamp < $tanggalInputTimestamp) {
                                                        continue; // Lewati iterasi ini dan lanjut ke item berikutnya dalam loop
                                                    }
                                                    
                                                @endphp
                                                @if (!in_array($tanggalKunjungan, $selectedDates))
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->user->name }} | Tanggal Kunjungan: {{ $tanggalKunjungan }}
                                                        | Jam Mulai: {{ $jamMulai }} | Jam Selesai: {{ $jamSelesai }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>



                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Petugas</label>
                                    <div class="col-sm-10">
                                        @foreach ($pegawai as $item)
                                            <div class="form-check">
                                                <input type="checkbox" name="pegawai_id[]" value="{{ $item->id }}"
                                                    class="form-check-input" id="pegawai_{{ $item->id }}">
                                                <label class="form-check-label"
                                                    for="pegawai_{{ $item->id }}">{{ $item->nama_pegawai }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm rounded-0">
                                    <i class="far fa-save"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm rounded-0">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('[name="pegawai_id[]"]');
            const selectedPetugasNames = document.getElementById('selectedPetugasNames');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox
                        .checked);
                    const selectedNames = selectedCheckboxes.map(checkbox => checkbox
                        .nextElementSibling.textContent);
                    selectedPetugasNames.innerHTML = `Nama Petugas: ${selectedNames.join(', ')}`;
                });
            });
        });

        function setStatus(value) {
            document.getElementById('status').value = value;
        }
    </script>


    <script>
        function setStatus(value) {
            document.getElementById('status').value = value;
        }
    </script>
@endsection
