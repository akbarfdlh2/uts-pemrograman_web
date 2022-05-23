<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('assets/img/esa unggul karyawan.png') }}" class="navbar-brand-img" alt="Universitas Esa Unggul">
        </a>
        <div class=" ml-auto ">
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('beasiswa') ? 'active' : '' }}" href="{{ route('beasiswa') }}">
                <i class="fa fa-table text-warning"></i>
                <span class="nav-link-text">Master Data Beasiswa</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>