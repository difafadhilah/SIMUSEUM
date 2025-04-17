@extends('frontend.layouts.main')
{{-- @include('frontend.layouts.navbar') --}}

<div class="container">
    <h1 class="mt-5 text-center">Buku Tamu Pengunjung Museum</h1>
    <form action="/bukutamu" method="POST">
        @csrf
        <div class="form-group">

            <label for="tanggal">Tanggal:</label>
            @error('tanggal')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="date" name="tanggal" id="tanggal" class="form-control">

        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            @error('nama')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="asal">Asal:</label>
            @error('asal')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="text" name="asal" id="asal" class="form-control">
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            @error('pekerjaan')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
        </div>
        <div class="form-group">
            <label for="usia">Usia:</label>
            @error('usia')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="number" name="usia" id="usia" class="form-control">
        </div>
        <div class="form-group">
            <label for="kesan">Kesan:</label>
            @error('kesan')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <input type="text" name="kesan" id="kesan" class="form-control">
        </div>
        <div class="form-group">
            <label for="pesan">Pesan:</label>
            @error('pesan')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
            <textarea name="pesan" id="pesan" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-3">Kirim Pesan</button>
    </form>
</div>

{{-- @include('frontend.layouts.footer') --}}
