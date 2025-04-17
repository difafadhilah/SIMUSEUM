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
<div class="hero page-inner overlay" style="background-image: url('{{ asset('frontend') }}/images/banner1.png')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Profile</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="section section-properties">
    <div class="container">
        <div class="row">
            <div class="col-6">
              <img src="{{ asset('frontend')}}/images/banner5.jpeg" alt="banner" class="img-fluid">
            </div>          
            <div class="col-md-6">
              <h2>Museum Rumah Kelahiran Bagindo Azizchan</h2>
              <div class="row">
                  <div class="col">
                      <p><strong>Alamat Museum:</strong><br> Jl. Alang Laweh Koto IV No. 7 Padang</p>
                      <p><strong>Nomor Telepon:</strong><br> 085375711000</p>
                      <p><strong>Email:</strong><br> museumbagindoazizchan@gmail.com</p>
                      <p><strong>Narahubung:</strong><br> 089504092329</p>
                      <p><strong>Jenis Museum:</strong><br> Museum Rumah Bersejarah</p>
                  </div>
                  <div class="col">
                      <p><strong>Nama Pemilik dan Jenis Pengelolaan:</strong><br> Pemko Padang</p>
                      <p><strong>Jumlah Koleksi:</strong><br> Sebanyak 59 Buah Koleksi</p>
                      <p><strong>Tanggal Berdiri dan Peresmian:</strong><br> Berdirinya dan diresmikan Pada Tanggal 18 Juli 2019</p>
                      <p><strong>Sumber Pendanaan:</strong><br> APBD, Melalui Dinas Pendidikan dan Kebudayaan Kota Padang</p>
                      <p><strong>Kepemilikan Tanah/bangunan:</strong><br> Sertifikat Hak Milik</p>
                      <p><strong>Luas Lahan dan Bangunan:</strong><br> -</p>
                      <p><strong>Harga Tiket Museum:</strong><br> Gratis (sampai menunggu kebijakan pengelola museum selanjutnya)</p>
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
