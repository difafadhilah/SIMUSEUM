@extends('dashboard.layouts.main')
@section('title', 'Tambah Jadwal Kunjungan')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Jadwal Kunjungan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/dashboard-jadwal-kunjungan">Jadwal Kunjungan</a></li>
                    <li class="breadcrumb-item active">Tambah Jadwal Kunjungan</li>
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
                        <h3 class="card-title">Form Tambah Jadwal Kunjungan</h3>
                    </div>
                    <form role="form" action="/dashboard-jadwal-kunjungan" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-2 col-form-label">Sekolah</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control">
                                        @foreach ($sekolahUsers as $sekolahUser)
                                            <option value="{{ $sekolahUser->id }}">{{ $sekolahUser->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_kunjungan" class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                                <div class="col-sm-10">
                                    <select name="petugas" class="form-control" >
                                        @foreach ($pegawai as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                                <div class="col-sm-10">
                                    <select name="petugas[]" class="form-control" multiple>
                                        @foreach ($pegawai as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Petugas</label>
                                <div class="col-sm-10">
                                    @foreach ($pegawai as $item)
                                        <div class="form-check">
                                            <input type="checkbox" name="petugas[]" value="{{ $item->id }}" class="form-check-input" id="petugas{{ $item->id }}">
                                            <label class="form-check-label" for="petugas{{ $item->id }}">{{ $item->nama_pegawai }}</label>
                                        </div>
                                    @endforeach
                                    <div id="selectedPetugasNames" class="mt-2"></div>
                                </div>
                            </div> --}}
                            
                            
                            
                            
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
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('[name="petugas[]"]');
        const selectedPetugasNames = document.getElementById('selectedPetugasNames');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
                const selectedNames = selectedCheckboxes.map(checkbox => checkbox.nextElementSibling.textContent);
                selectedPetugasNames.innerHTML = `Nama Petugas: ${selectedNames.join(', ')}`;
            });
        });
    });
</script>


<script>
    function setStatus(value) {
        document.getElementById('status').value = value;
    }
</script>
@endsection
