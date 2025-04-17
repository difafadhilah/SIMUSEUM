
@extends('dashboard.layouts.main')
@section('title','Divisi')
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
@if (session()->has('delete'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    <h4>{{ session('delete') }}</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endif
<script>
  // Show the success modal when the page loads
  document.addEventListener('DOMContentLoaded', function () {
      var myModal = new bootstrap.Modal(document.getElementById('successModal'));
      myModal.show();
  });
</script>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Divisi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Divisi</li>
              </ol>
            </div><!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"> Tabel Divisi </h3>
                <a href="/dashboard-divisi/create" class="ml-auto btn btn-primary rounded-0 btn-sm"> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr >
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th style="width: 175px">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($divisis as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_divisi ?? '-'}}</td>
                        
                        <td class="text-center">
                          <div>
                              <a href="/dashboard-divisi/{{ $item->id }}/edit" class="btn btn-success btn-sm rounded-0"><i class="fa fa-edit"></i> Ubah</a>
                              <button type="button" class="btn btn-warning btn-sm rounded-0 swalDeleteButton" data-toggle="modal" data-target="#modal-delete{{ $item->id }}">
                                  <i class="fa fa-trash"></i> Hapus
                              </button>
                          </div>
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
    </div>
</div>

@foreach ($divisis as $item)
<div class="modal fade" id="modal-delete{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus divisi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus divisi ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <form action="/dashboard-divisi/{{ $item->id }}" method="POST" id="delete-form-{{ $item->id }}">
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
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


@endsection