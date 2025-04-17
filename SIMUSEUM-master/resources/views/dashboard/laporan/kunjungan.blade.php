@extends('dashboard.layouts.main')
@section('title', 'Laporan Kunjungan Sekolah')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Laporan Kunjungan Sekolah</h3>
                        <div>
                            <a href="#" class="btn btn-primary btn-sm rounded-0" title="Print" onclick="printTable()"> <i
                                    class="fa fa-print"></i></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="form-group">
                            <label for="filterMonth" class="mr-2">Filter Bulan:</label>
                            <select id="filterMonth" class="form-control form-control-sm" onchange="applyFilter()">
                                <option value="">Semua Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="112">Desember</option>
                                <!-- ... tambahkan bulan-bulan lainnya ... -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="filterYear" class="mr-2">Filter Tahun:</label>
                            <input type="number" id="filterYear" class="form-control form-control-sm" min="2000"
                                max="2099" onchange="applyFilter()">
                        </div>
                    </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $historiGrouped = $historiKunjungan->groupBy('kunjunganPetugas.jadwalKunjungan.user.id');
                                @endphp
                                @foreach ($historiGrouped as $userId => $historiGroup)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->user->name ??'-'}}</td>
                                        <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->tgl_kunjungan ??'-' }}</td>
                                        <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->jam_mulai ??'-'}}</td>
                                        <td>{{ $historiGroup[0]->kunjunganPetugas->jadwalKunjungan->jam_selesai ??'-'}}</td>
                                        <td>
                                            @foreach ($historiGroup as $index => $item)
                                                {{ $item->kunjunganPetugas->petugas->nama_pegawai ??'-'}}
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
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        function printTable() {
            const printContents = `
            <html>
            <head>
                <title>Laporan Buku Tamu Museum Bagindo Aziz</title>
                <style>
                    .center-title {
                        text-align: center;
                        margin-top:4px;
                    }
                </style>
            </head>
            <body>
                <div class="text-center">
                    <h3 class="center-title">Laporan Buku Tamu Museum Bagindo Aziz</h3>
                </div>
                ${document.getElementById("example1").outerHTML}
            </body>
            </html>
        `;

            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function applyFilter() {
            const filterMonth = document.getElementById("filterMonth").value;
            const filterYear = document.getElementById("filterYear").value;
            const rows = document.querySelectorAll("#example1 tbody tr");

            rows.forEach(row => {
                const dateCell = row.querySelector("td:nth-child(3)")
                .textContent; // Adjust index to match the column with the date
                const [year, month] = dateCell.split("-");

                if ((filterMonth === "" || filterMonth === month) &&
                    (filterYear === "" || filterYear === year)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
@endsection
