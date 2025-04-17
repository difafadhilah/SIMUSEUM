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
                <h1 class="heading" data-aos="fade-up">Sejarah</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Sejarah
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
              <img src="{{asset('frontend')}}/images/bagindo.jpg" alt="bagindo" class="img-fluid" >
            </div>          
            <div class="col-md-6">
              <h2>Sejarah Rumah Kelahiran Bagindo Azizchan</h2>
              <div class="row">
                  <div class="col">
                    <p style="text-align: justify">Bagindo Aziz Chan merupakan Walikota Padang kedua setelah kemerdekaan yang gigih menentang Belanda. Ia dilantik pada tanggal 15 Agustus 1946 menggantikan Mr. Abubakar Jaar. Ia gugur dalam usia 36 tahun ditembak oleh pasukan Belanda di Simpang Kandih, Kampung Lapai. Jasadnya dikebumikan di Taman Makam Pahlawan Bahagia, Bukittinggi.</p>
                  </div>
                  <div class="col">
                    <p style="text-align: justify">Pada tahun 2005 sudah mulai rencana untuk menjadikan rumah kelahiran Bagindo Azizchan menjadi Museum, namun baru terlaksana pada Tahun 2017 dimulai lah renovasi rumah kelahiran Bagindo Azizchan yang sudah rusak akibat usia dan gempa 2009. Tahun 2018 dilanjutkan lagi dengan renovasi dan pembangunan rumah kelahiran Bagindo Azizchan. Museum ini diresmikan pada tanggal 18 Juli 2019.</p>
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
