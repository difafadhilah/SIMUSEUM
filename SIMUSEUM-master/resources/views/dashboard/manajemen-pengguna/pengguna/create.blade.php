@extends('dashboard.layouts.main')
@section('title','Tambah Pengguna')
@section('container')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active"><a href="/dashboard-pengguna">Pengguna</a></li>
                <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                        <h3 class="card-title">Form Tambah Pengguna</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="/dashboard-pengguna" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Username</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>    
                                </div>
                            </div>
                            @auth
                            @if (auth()->user()->role == 'superadmin')
                            <div class="form-group">
                                <label for="role">Role</label>
                                <div class="input-group">
                                    <select class="form-control" id="role" name="role" class="btn btn-info">
                                        <option value="admin">Admin</option>
                                        <option value="dinas_pendidikan">Dinas Pendidikan</option>
                                        <option value="sekolah">Sekolah</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div> 
                                </div>
                            </div>
                            @elseif(auth()->user()->role == 'admin')
                            <div class="form-group">
                                <label for="role">Role</label>
                                <div class="input-group">
                                    <select class="form-control" id="role" name="role" class="btn btn-info">
                                        <option   value="sekolah">Sekolah</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div> 
                                </div>
                            </div>
                            @endif
                            @endauth
                            <div class="form-group">
                                <label for="kontak">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder=" Masukkan Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak Sekolah">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <!-- Tambahkan form untuk atribut lainnya sesuai kebutuhan -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm rounded-0"><i class="far fa-save"> Simpan</i></button>
                            <button type="#" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-xmark">Batal</i></button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const passwordInput = document.querySelector('#password');
    const confirmPasswordInput = document.querySelector('#password_confirmation');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        toggleConfirmPassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });
</script>
@endsection
