{{-- @extends('frontend.layouts.main')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{ asset('frontend') }}/images/banner3.png')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Koleksi</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            {{ $koleksi->nama_koleksi }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($koleksi->gambar) }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $koleksi->nama_koleksi }}</h5>
                                <p class="card-text"><strong>No Koleksi:</strong> {{ $koleksi->no_koleksi }}</p>
                                <p class="card-text"><strong>Jenis Koleksi:</strong> {{ $koleksi->jenis_koleksi }}</p>
                                <p class="card-text"><strong>Ukuran:</strong> {{ $koleksi->ukuran }}</p>
                                <p class="card-text"><strong>Deskripsi:</strong> {{ $koleksi->deskripsi }}</p>
                                <p class="card-text"><strong>Asal:</strong> {{ $koleksi->asal }}</p>
                                <p class="card-text"><strong>Keadaan:</strong> {{ $koleksi->keadaan }}</p>
                                <!-- Tambahkan informasi lainnya sesuai dengan field di database -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('frontend.layouts.footer') --}}
@extends('frontend.layouts.main')
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

@include('frontend.layouts.siteNav')
<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Koleksi</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            {{ $koleksi->nama_koleksi }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="section section-properties">
    <div class="container">
        {{-- <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Koleksi</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            {{ $koleksi->nama_koleksi }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div> --}}
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($koleksi->gambar) }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $koleksi->nama_koleksi }}</h5>
                                <p class="card-text"><strong>No Koleksi:</strong> {{ $koleksi->no_koleksi }}</p>
                                <p class="card-text"><strong>Jenis Koleksi:</strong> {{ $koleksi->jenis_koleksi }}</p>
                                <p class="card-text"><strong>Ukuran:</strong> {{ $koleksi->ukuran }}</p>
                                <p class="card-text"><strong>Deskripsi:</strong> {{ $koleksi->deskripsi }}</p>
                                <p class="card-text"><strong>Asal:</strong> {{ $koleksi->asal }}</p>
                                <p class="card-text"><strong>Keadaan:</strong> {{ $koleksi->keadaan }}</p>
                                <!-- Tambahkan informasi lainnya sesuai dengan field di database -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.footer')
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>


