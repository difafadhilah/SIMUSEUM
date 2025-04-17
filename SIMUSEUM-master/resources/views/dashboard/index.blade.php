@extends('dashboard.layouts.main')
@section('title', 'Sistem Informasi Museum Bagindo Aziz Chan')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->


            @if (Auth::user()->role == 'superadmin')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalTamu }}</h3>
                                <p>Buku Tamu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalPengguna }}</h3>
                                <p>Pengguna</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="dashboard-pengguna" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalJadwal }}</h3>
                                <p>Jadwal Kunjungan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalKoleksi }}</h3>
                                <p>Koleksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="dashboard-koleksi" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            @elseif(Auth::user()->role == 'admin')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalTamu }}</h3>
                                <p>Buku Tamu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalPengguna }}</h3>
                                <p>Pengguna</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="dashboard-pengguna" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalJadwal }}</h3>
                                <p>Kunjungan Petugas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalKoleksi }}</h3>
                                <p>Koleksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="dashboard-koleksi" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            @endif

            @if (auth()->user()->role == 'admin')
                @include('dashboard.grafik.index')
            @endif


            @if (Auth::user()->role == 'sekolah')
                {{-- <div class="card" hidden>
                    <div class="card-header">
                        <h3>Kunjungan Harian</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal </th>
                                        <th>Nama </th>
                                        <th>Asal</th>
                                        <th>Pekerjaan</th>
                                        <th>Usia</th>
                                        <th>Kesan</th>
                                        <th>Pesan</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukutamu as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->asal }}</td>
                                            <td>{{ $item->pekerjaan }}</td>
                                            <td>{{ $item->usia }}</td>
                                            <td>{{ $item->kesan }}</td>
                                            <td>{{ $item->pesan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> --}}
                <div class="card">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $historiGrouped = $historiKunjungan->groupBy('kunjunganPetugas.jadwalKunjungan.user.id');
                                    @endphp
                                    @foreach ($historiGrouped as $userId => $historiGroup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->user->name }}</td>
                                            <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->tgl_kunjungan }}
                                            </td>
                                            <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->jam_mulai }}</td>
                                            <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->jam_selesai }}</td>
                                            <td>
                                                @foreach ($historiGroup as $index => $item)
                                                    {{ $item->kunjunganPetugas->petugas->nama_pegawai }}
                                                    @if ($index < count($historiGroup) - 1)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                {{-- @elseif (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role || 'dinas_pendidikan') --}}
                {{-- <div class="card"> --}}
                {{-- <div class="card-header">
                        <h3>Kunjungan Harian</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal </th>
                                        <th>Nama </th>
                                        <th>Asal</th>
                                        <th>Pekerjaan</th>
                                        <th>Usia</th>
                                        <th>Kesan</th>
                                        <th>Pesan</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukutamu as $item)
                                        <tr>
                                            <td>{{ ($bukutamu->currentpage() - 1) * $bukutamu->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->asal }}</td>
                                            <td>{{ $item->pekerjaan }}</td>
                                            <td>{{ $item->usia }}</td>
                                            <td>{{ $item->kesan }}</td>
                                            <td>{{ $item->pesan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $bukutamu->links() }}
                        </div>
                    </div> --}}
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
