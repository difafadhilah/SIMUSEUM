@extends('dashboard.layouts.main')
@section('title', 'Kunjungan')
@section('container')

    @if (session()->has('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="">
                                <i class="fas fa-check-circle fa-5x text-success"></i>
                            </div>
                            <h4>{{ session('success') }}</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Kunjungan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal Kunjungan</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            <a href="/dashboard-jadwal-kunjungan/create" class="btn btn-primary btn-sm rounded-0"><i
                    class="fas fa-plus"></i> Tambah Jadwal Kunjungan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sekolah </th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalKunjungan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_kunjungan)->format('d F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="dashboard-jadwal-kunjungan/{{ $item->id }}/edit"
                                            class="btn btn-success btn-sm rounded-0" title="edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-warning btn-sm rounded-0 swalDeleteButton"
                                            title="hapus" data-toggle="modal"
                                            data-target="#modal-delete{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <a href="/dashboard-kunjungan-petugas/create" class="btn btn-primary btn-sm rounded-0"><i
                    class="fas fa-plus"></i> Tambah Kunjungan Petugas</a>
            <a href="/dashboard-jadwal-kunjungan/create" class="btn btn-primary btn-sm rounded-0"><i
                    class="fas fa-plus"></i> Tambah Jadwal Kunjungan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sekolah </th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kunjunganPetugas->groupBy('jadwalKunjungan_id') as $jadwalId => $groupedItems)
                            @php
                                $firstItem = $groupedItems->first();
                                $namaPetugas = $groupedItems->pluck('petugas.nama_pegawai')->implode(', ');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $firstItem->jadwalKunjungan->user->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($firstItem->jadwalKunjungan->tgl_kunjungan ?? '-')->format('d F Y') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($firstItem->jadwalKunjungan->jam_mulai ?? '-')->format('H:i') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($firstItem->jadwalKunjungan->jam_selesai ?? '-')->format('H:i') }}
                                </td>
                                <td>
                                    @if ($groupedItems->count() > 0)
                                        {{ $namaPetugas }}
                                    @else
                                        Tidak ada petugas
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('kunjungan-petugas.success', ['id' => $firstItem->id]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Berhasil
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($kunjunganPetugas->groupBy('jadwalKunjungan_id') as $jadwalId => $groupedItems)
                            @foreach ($groupedItems as $index => $item)
                                <tr>
                                    @if ($index === 0)
                                        <td rowspan="{{ $groupedItems->count() }}">{{ $loop->iteration }}</td>
                                        <td rowspan="{{ $groupedItems->count() }}">
                                            {{ $item->jadwalKunjungan->user->name ?? '-' }}</td>
                                        <td rowspan="{{ $groupedItems->count() }}">
                                            {{ \Carbon\Carbon::parse($item->jadwalKunjungan->tgl_kunjungan)->format('d F Y') }}
                                        </td>
                                        <td rowspan="{{ $groupedItems->count() }}">
                                            {{ \Carbon\Carbon::parse($item->jadwalKunjungan->jam_mulai)->format('H:i') }}
                                        </td>
                                        <td rowspan="{{ $groupedItems->count() }}">
                                            {{ \Carbon\Carbon::parse($item->jadwalKunjungan->jam_selesai)->format('H:i') }}
                                        </td>
                                    @endif
                                    <td>{{ $item->petugas ? $item->petugas->nama_pegawai : 'Tidak ada petugas' }}</td>
                                    <td>
                                        @if ($index === 0)
                                            <form action="{{ route('kunjungan-petugas.success', ['id' => $item->id]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Berhasil
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach --}}
                    </tbody>



                </table>
            </div>
        </div>
    </div>


    @foreach ($jadwalKunjungan as $item)
        <div class="modal fade" id="modal-delete{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Koleksi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus koleksi ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <form action="/hapus-koleksi/{{ $item->id }}" method="POST"
                            id="delete-form-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger swalDeleteButton">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
