<ul class="header__menu__list">
    <li class="header__menu__list-item">
      <a href="/" class="header__menu__list-link">
        trang chủ
      </a>
    </li>
    <li class="header__menu__list-item">
      <a href="/dich-vu" class="header__menu__list-link">dịch vụ</a>
      <button class="mobile__menu-btn mobile__menu__btn__js">
        <i class="fa-solid fa-angle-down"></i>
      </button>

      <button
        class="mobile__menu-btn mobile__menu__btn__js__up mobile__menu-btn--up pc-on-hide"
      >
        <i class="fa-solid fa-angle-down"></i>
      </button>

      <div class="mobile__menu__dropdown moblie-on-hide">
        <div class="header__menu__dropdown__wrapper">
          <ul class="header__menu__list">
            @foreach ($menus as $menu)
            <li class="header__menu__list-item">
              <a href="/danh-muc/{{ $menu->id }}-{{ \Str::slug($menu->name) }}" class="header__menu__list-link">
                {{ $menu->name }}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </li>
    <li class="header__menu__list-item">
      <a href="/tin-tuc" class="header__menu__list-link"> tin tức </a>
    </li>
    <li class="header__menu__list-item">
      <a href="/gioi-thieu" class="header__menu__list-link"> giới thiệu </a>
    </li>
  </ul>
