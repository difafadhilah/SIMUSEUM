<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="{{url('/')}}" class="logo m-0 float-start">Simuseum</a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Beranda</a></li>
                    <li class="has-children {{ Request::is('profile', 'visi-misi') ? 'active' : '' }}">
                        <a>Tentang Kami</a>
                        <ul class="dropdown">
                            <li><a href="{{url('/profile')}}">Profile</a></li>
                            <li><a href="{{url('/visi-misi')}}">Visi Misi</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('koleksi') ? 'active' : '' }}"><a href="{{url('/koleksi')}}">Koleksi</a></li>
                    <li class="{{ Request::is('sejarah') ? 'active' : '' }}"><a href="{{url('/sejarah')}}">Sejarah</a></li>
                    <li class="{{ Request::is('kontak') ? 'active' : '' }}"><a href="{{url('/kontak')}}">Kontak</a></li>
                </ul>

                <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>

  <div class="hero">
    <div class="hero-slide">
      <div
        class="img overlay"
        style="background-image: url('{{ asset('frontend') }}/images/banner3.png')"
      ></div>
      <div
        class="img overlay"
        style="background-image: url('{{ asset('frontend') }}/images/banner2.png')"
      ></div>
      <div
        class="img overlay"
        style="background-image: url('{{ asset('frontend') }}/images/banner1.png')"
      ></div>
    </div>

    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center">
          <h1 class="heading" data-aos="fade-up">
            Museum Rumah Kelahiran Bagindo Aziz Chan 
          </h1>
          <form
            action="#"
            class="narrow-w form-search d-flex flex-column align-items-center mb-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <a href="/login" type="submit" class="btn btn-primary">Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>