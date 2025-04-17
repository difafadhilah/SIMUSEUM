<aside class="main-sidebar sidebar-light elevation-4" style="background-color: #005555;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: white;">SIMUSEUM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div> --}}
            <div class="info">
                @auth
                    <a href="{{ url('dashboard-profile') }}" class="d-block"
                        style="color: white;">{{ auth()->user()->name }}</a>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                        style="background-color: {{ Request::is('dashboard') ? '#20c997' : '' }}; color: white;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' )
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard-pengguna', 'dashboard-divisi', 'dashboard-pegawai') ? 'active' : '' }}"
                            style="background-color: {{ Request::is('dashboard-pengguna', 'dashboard-divisi', 'dashboard-pegawai') ? '#20c997' : '' }}; color: white;">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Manajemen Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('dashboard-pengguna') }} "
                                    class="nav-link {{ Request::is('dashboard-pengguna') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-pengguna') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('dashboard-divisi') }}"
                                    class="nav-link {{ Request::is('dashboard-divisi') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-divisi') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Divisi</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ url('dashboard-pegawai') }}"
                                    class="nav-link {{ Request::is('dashboard-pegawai') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-pegawai') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard-koleksi') ? 'active' : '' }}"
                            style="background-color: {{ Request::is('dashboard-koleksi') ? '#20c997' : '' }}; color: white;">

                            <i class="nav-icon fas fa-monument"></i>
                            <p>
                                Manajemen Museum
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('dashboard-koleksi') }}"
                                    class="nav-link {{ Request::is('dashboard-koleksi') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-koleksi') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inventaris Koleksi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard-jadwal-kunjungan', 'dashboard-histori-kunjungan') ? 'active' : '' }}"
                            style="background-color: {{ Request::is('dashboard-jadwal-kunjungan', 'dashboard-histori-kunjungan') ? '#20c997' : '' }}; color: white;">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Manajemen Kegiatan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('dashboard-jadwal-kunjungan') }}"
                                    class="nav-link {{ Request::is('dashboard-jadwal-kunjungan') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-jadwal-kunjungan', 'dashboard-jadwal-kunjungan') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Kunjungan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('dashboard-histori-kunjungan') }}"
                                    class="nav-link {{ Request::is('dashboard-histori-kunjungan') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-histori-kunjungan', 'dashboard-histori-kunjungan') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Histori Kunjungan
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard-laporan-kunjungan', 'dashboard-laporan-buku-tamu') ? 'active' : '' }}"
                            style="background-color: {{ Request::is('dashboard-laporan-kunjungan', 'dashboard-laporan-buku-tamu') ? '#20c997' : '' }}; color: white;">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('dashboard-laporan-kunjungan') }}"
                                    class="nav-link {{ Request::is('dashboard-laporan-kunjungan') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-laporan-kunjungan') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Kunjungan </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('dashboard-laporan-buku-tamu') }}"
                                    class="nav-link {{ Request::is('dashboard-laporan-buku-tamu') ? 'active' : '' }}"
                                    style="background-color: {{ Request::is('dashboard-laporan-buku-tamu') ? '#20c997' : '' }}; color: white;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Laporan Buku Tamu
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->role == 'sekolah')
                    <li class="nav-item">
                        <a href="{{ url('dashboard-feedback') }}"
                            class="nav-link {{ Request::is('dashboard-feedback') ? 'active' : '' }}"
                            style="background-color: {{ Request::is('dashboard-feedback') ? '#20c997' : '' }}; color: white;">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Form Feedback
                            </p>
                        </a>
                    </li>
                @endif





                <!-- Login -->

                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link"
                        style="background-color: {{ Request::is('logout') ? '#20c997' : '' }}; color: white;">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
