@extends('dashboard.layouts.main')
@section('title', 'Detail Pegawai')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard-pegawai">Pegawai</a></li>
                    <li class="breadcrumb-item active">Detail Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Foto Pegawai</h3>
                    </div>
                    <div class="card-body text-center">
                       <img src="{{ Storage::url($pegawai->avatar) }}" alt="{{ $pegawai->nama_pegawai }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Detail Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <p>{{ $pegawai->nama_pegawai }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Tanggal Lahir:</strong>
                            <p>{{ $pegawai->tgl_lahir }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Jenis Kelamin:</strong>
                            <p>{{ $pegawai->jenis_kelamin }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p>{{ $pegawai->email }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>No Telp:</strong>
                            <p>{{ $pegawai->no_tlp }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Divisi:</strong>
                            <p>{{ $pegawai->divisi->nama_divisi }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Alamat:</strong>
                            <p>{{ $pegawai->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
