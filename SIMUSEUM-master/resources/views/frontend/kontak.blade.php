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
    <div class="hero page-inner overlay" style="background-image: url('{{ asset('frontend') }}/images/banner3.png')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Kontak</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Kontak
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
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Lokasi</h4>
                            <p>
                                Jl. Alang Laweh Koto IV No. 7 Padang
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Jam Buka:</h4>
                            <p>
                                Selasa-Minggu<br />
                                08:00 AM - 16:00 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>museumbagindoazizchan@gmail.com</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Telepon</h4>
                            <p>089504092329</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="#">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Nama " />
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" class="form-control" placeholder="Email" />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Judul" />
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Pesan"></textarea>
                            </div>

                            <div class="col-12">
                                <input type="submit" value="Kirim Pesan" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
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
