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
    <div class="hero page-inner overlay" style="background-image: url('{{ asset('frontend') }}/images/banner4.jpeg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Koleksi</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Koleksi
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
                @foreach ($koleksi as $item)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item mb-30">
                            <a href="{{ route('koleksi.detail', ['id' => $item->id]) }}" class="img">
                              <img src="{{ Storage::url($item->gambar) }}" alt="Image" class="img-fluid" />
                          </a>

                            <div class="property-content">
                                <div class="price mb-2"><span>{{ $item->nama_koleksi }}</span></div>
                                <div>
                                    <span class="d-block mb-2 text-black-50">{{ $item->deskripsi }}</span>
                                    <a href="{{ route('koleksi.detail', ['id' => $item->id]) }}"
                                        class="btn btn-primary py-2 px-3">See details</a>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                    </div>
                @endforeach
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
