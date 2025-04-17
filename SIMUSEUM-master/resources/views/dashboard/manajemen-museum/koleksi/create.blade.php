@extends('dashboard.layouts.main')
@section('title', 'Tambah Koleksi')
@section('container')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Koleksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/dashboard-koleksi">Koleksi</a></li>
                    <li class="breadcrumb-item active">Tambah Koleksi</li>
                </ol>
            </div>
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
                        <h3 class="card-title">Form Tambah Koleksi</h3>
                    </div>
                    <form role="form" action="/dashboard-koleksi" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama_koleksi" class="col-sm-2 col-form-label">Nama Koleksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_koleksi" name="nama_koleksi"
                                        placeholder="Masukkan nama koleksi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_koleksi" class="col-sm-2 col-form-label">Jenis Koleksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jenis_koleksi" name="jenis_koleksi"
                                        placeholder="Masukkan jenis koleksi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ukuran</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="panjang" class="col-form-label">Panjang</label>
                                            <input type="number" class="form-control" id="panjang" name="ukuran[panjang]"
                                                placeholder="Panjang">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="lebar" class="col-form-label">Lebar</label>
                                            <input type="number" class="form-control" id="lebar" name="ukuran[lebar]"
                                                placeholder="Lebar">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="diameter" class="col-form-label">Diameter</label>
                                            <input type="number" class="form-control" id="diameter"
                                                name="ukuran[diameter]" placeholder="Diameter">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="tinggi" class="col-form-label">Tinggi</label>
                                            <input type="number" class="form-control" id="tinggi" name="ukuran[tinggi]"
                                                placeholder="Tinggi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="asal" class="col-sm-2 col-form-label">Asal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="asal" name="asal"
                                        placeholder="Masukkan asal koleksi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keadaan" class="col-sm-2 col-form-label">Keadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keadaan" name="keadaan"
                                        placeholder="Masukkan keadaan koleksi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_koleksi" class="col-sm-2 col-form-label">Nomor Koleksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_koleksi" name="no_koleksi"
                                        placeholder="Masukkan nomor koleksi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Masukkan deskripsi koleksi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm rounded-0"><i
                                    class="far fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-times"></i>
                                Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
