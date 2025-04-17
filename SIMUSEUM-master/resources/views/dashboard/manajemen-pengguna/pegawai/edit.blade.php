@extends('dashboard.layouts.main')
@section('title', 'Edit Pegawai')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard-pegawai">Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Pegawai</h3>
                    </div>
                    <form action="/dashboard-pegawai/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLaki" value="Laki-laki" {{ $pegawai->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radioLaki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan" value="Perempuan" {{ $pegawai->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radioPerempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $pegawai->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_tlp" class="col-sm-3 col-form-label">No Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ $pegawai->no_tlp }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="divisi_id" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="divisi_id" name="divisi_id">
                                        <option value="">Pilih Divisi</option>
                                        @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}" {{ $pegawai->divisi_id === $divisi->id ? 'selected' : '' }}>{{ $divisi->nama_divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pesan" class="col-sm-3 col-form-label">Pesan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="pesan" name="pesan" rows="3">{{ $pegawai->pesan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $pegawai->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                                    @if ($pegawai->avatar)
                                    <img src="{{ Storage::url($pegawai->avatar) }}" alt="Avatar" class="img-fluid mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm rounded-0"><i class="far fa-save"></i> Simpan</button>
                            <a href="/dashboard-pegawai" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-times"></i> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
