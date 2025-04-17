@extends('dashboard.layouts.main')
@section('title', 'Museum Bagindo Aziz Chan')
@section('container')
    <div class="container">
        <div id="section" class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="text-center">Edit Profile Museum</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Museum:</label>
                                    <input type="text" id="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon:</label>
                                    <input type="text" id="no_telp" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Kontak:</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control" value="{{ old('kontak') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Jenis Museum</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control" value="{{ old('kontak') }}">
                                </div>
                                

                                <!-- Lanjutkan dengan input fields lainnya -->

                                <div class="form-group">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
