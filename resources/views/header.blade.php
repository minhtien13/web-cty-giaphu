

<header class="header" id="header__id">
    @include('bar')

    <div class="container">
      <div class="header__container">
        <div class="header__container__left pc-on-hide moblie-on-show">
          <button class="header__container__btn btn show__menu__js">
            <i class="fa-solid fa-bars"></i>
          </button>
        </div>

        <a href="/" class="header__container__logo-link">
          <img
            src="/template/asset/images/logo.jpg"
            alt="gia phú Architects"
            class="header__container__logo-ima"
          />
        </a>

        <div class="header__menu moblie-on-hide pc-on-show">
          @include('menus.menu')
        </div>

        <div class="header__container__right">
          <button class="header__container__btn btn show__search__js">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </div>
    </div>

    <!--  -->
    <div class="mobile__overlay overlay hide__menu__js pc-on-hide mobile__menu__js"></div>
    <div class="mobile__menu pc-on-hide mobile__menu__js">
      <h3 class="mobile__heading">menu</h3>
      @include('menus.mobile')
    </div>
    <span
      class="mobile__menu__close hide__menu__js pc-on-hide mobile__menu__js"
    >
      <i class="fa-solid fa-xmark"></i>
    </span>
  </header>
