@extends('dashboard.layouts.main')
@section('title','Tambah Pegawai')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pegawai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active"><a href="/dashboard-pegawai">Pegawai</a></li>
                <li class="breadcrumb-item active">Tambah Pegawai</li>
              </ol>
            </div><!-- /.col -->
        </div>
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
                        <h3 class="card-title">Form Tambah Pegawai</h3>
                    </div>
                    <form role="form" action="/dashboard-pegawai" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan nama pegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLaki" value="Laki-laki">
                                        <label class="form-check-label" for="radioLaki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan" value="Perempuan">
                                        <label class="form-check-label" for="radioPerempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_tlp" class="col-sm-3 col-form-label">No Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan no telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="divisi" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="divisi" name="divisi">
                                        <option value="">Pilih Divisi</option>
                                        <option value="Ketua Museum">Ketua Museum</option>
                                        <option value="Pemandu Museum">Pemandu Museum</option>
                                        <option value="Tenaga Kebersihan">Tenaga Kebersihan</option>
                                        {{-- @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pesan" class="col-sm-3 col-form-label">Pesan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Masukkan Pesan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-3 col-form-label">Foto Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm rounded-0"><i class="far fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
