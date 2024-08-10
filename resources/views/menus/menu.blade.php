<ul class="header__menu__list">
    <li class="header__menu__list-item">
      <a href="/" class="header__menu__list-link">
        trang chủ
      </a>
    </li>
    <li class="header__menu__list-item">
      <a href="/dich-vu" class="header__menu__list-link">
        dịch vụ
      </a>

      <div class="header__menu__dropdown">
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
      <a href="/gioi-thieu" class="header__menu__list-link">
        giới thiệu
      </a>
    </li>
    <li class="header__menu__list-item">
      <a href="/tin-tuc" class="header__menu__list-link">
        tin tức
      </a>
    </li>
    <li class="header__menu__list-item">
      <a href="/lien-he" class="header__menu__list-link">
        liên hệ
      </a>
    </li>
  </ul>
