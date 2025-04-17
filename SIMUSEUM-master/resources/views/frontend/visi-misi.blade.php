@extends('frontend.layouts.main')
<section id="visi-misi">
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
                    <h1 class="heading" data-aos="fade-up">Visi Misi</h1>
    
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Visi Misi
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
                <div class="col-md-6">
                    <h2>Visi</h2>
                    <p>Terwujudnya Museum Rumah Kelahiran Bagindo Azizchan sebagai pusat informasi, edukasi, dan komunikasi
                        mengenai Bagindo Azizchan maupun sejarah dan budaya Kota Padang.</p>
                </div>
                <div class="col-md-6">
                    <h2>Misi</h2>
                    <ul>
                        <li>Pengumpulan benda bernilai sejarah Bagindo Azizchan</li>
                        <li>Perawatan benda sejarah Bagindo Azizchan</li>
                        <li>Pelaksanaan layanan edukasi mengenai sejarah Bagindo Azizchan dan sejarah budaya Kota Padang
                        </li>
                        <li>Memfasilitasi pengkajian, pengumpulan, perawatan, pengamanan, penyajian, dan layanan edukasi di
                            bidang sejarah Walikota Bagindo Azizchan, sejarah, dan budaya Kota Padang</li>
                        <li>Penanaman nilai-nilai perjuangan Walikota Bagindo Azizchan kepada generasi penerus</li>
                    </ul>
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
</section>

