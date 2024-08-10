<?php $menuSidebars = App\helpers\helper::loadMenuPublic() ?>

<div class="product__service__wrapper moblie-on-hide">
    <div class="product__service__silder">
      <h3 class="product__service__silder__heading">
        Các dịch vụ
      </h3>
      <ul class="product__service__silder__list">
        @foreach ($menuSidebars as $menuSidebar)
            <li class="product__service__silder__list-item">
                <a href="/danh-muc/{{ $menuSidebar->id }}-{{ \Str::slug($menuSidebar->name) }}" class="product__service__silder__list-link">
                    {{ $menuSidebar->name }}
                </a>
            </li>
        @endforeach

      </ul>
    </div>
  </div>
