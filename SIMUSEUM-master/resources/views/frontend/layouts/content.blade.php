<div class="section" id="koleksi">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Koleksi Museum
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="property-slider-wrap">
                    <div class="property-slider" style="max-height: 100rem">
                        @foreach ($koleksi as $item)
                            <div class="property-item">
                                <a href="#" class="img">
                                    <img src="{{ Storage::url($item->gambar) }}" alt="Image" class="img-fluid"
                                        style="min-height: 100" />

                                </a>
                                <div class="property-content">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="mb-3  ">
                                            <h5
                                                class="city d-block {{ str_word_count($item->nama_koleksi) <= 5 ? 'mb-4' : 'mb-2' }}">
                                                {{ $item->nama_koleksi }}
                                            </h5>
                                        </div>
                                        <div class="mb-2 description">
                                            <span class="text-black-50">{{ $item->deskripsi }}</span>
                                        </div>
                                        <div>
                                            <a href="{{ route('koleksi.detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary py-2 px-3">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                    </div>

                    <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                        <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                        <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="features-1">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature">

                    <img src="{{ asset('frontend') }}/images/galeri/gal1.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature">
                    <img src="{{ asset('frontend') }}/images/galeri/gal2.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature">
                    <img src="{{ asset('frontend') }}/images/galeri/gal3.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature">
                    <img src="{{ asset('frontend') }}/images/galeri/gal3.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section sec-testimonials">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                    Sekolah Testimoni
                </h2>
            </div>
            <div class="col-md-6 text-md-end">
                <div id="testimonial-nav">
                    <span class="prev" data-controls="prev">Prev</span>

                    <span class="next" data-controls="next">Next</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
            <div class="testimonial-slider">
              @foreach ($feedback as $item)
                <div class="item">
                    <div class="testimonial">
                        {{-- <img src="images/person_{{ $loop->iteration }}-min.jpg" alt="Image"
                            class="img-fluid rounded-circle w-25 mb-4" /> --}}
                        <div class="rate">
                            @for ($i = 1; $i <= $item->rating; $i++)
                                <span class="icon-star text-warning"></span>
                            @endfor
                        </div>
                        <h3 class="h5 text-primary mb-4">{{ $item->user->name ?? '-' }}</h3>
                        <blockquote>
                            <p>
                                &ldquo;{{ $item->kesan }}&rdquo;
                            </p>
                        </blockquote>
                        <p class="text-black-50">{{ $item->pesan }}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>

<div class="section section-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6 mb-5">
                <h2 class="font-weight-bold heading text-primary mb-4">
                    Tim Kami
                </h2>
                {{-- <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                    enim pariatur similique debitis vel nisi qui reprehenderit totam?
                    Quod maiores.
                </p> --}}
            </div>
        </div>
        <div class="row">
            @foreach ($pegawai as $p)
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ Storage::url($p->avatar) }}" alt="Image" class="img-fluid" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">{{ $p->nama_pegawai }}</a></h2>
                            <span class="meta d-block mb-3">{{ $p->divisi->nama_divisi }}</span>
                            <p>
                                {{ $p->pesan }}
                            </p>

                            {{-- <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item">
                                    <a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
