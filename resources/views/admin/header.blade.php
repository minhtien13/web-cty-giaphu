<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
      </li>

      @if (\Auth::user()->is_level == 1)
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin/contact/add" class="nav-link">Trang Liên Hệ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin/intro/add" class="nav-link">Trang Giới Thiệu</a>
            </li>
      @endif
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="" method="get">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="s" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
