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
