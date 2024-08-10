<div class="bread">
    <div class="container">
      <ul class="bread__list">
        <li class="bread__list-item">
          <a href="/" class="bread__list-link">Trang chủ</a>
          <span><i class="fa-solid fa-chevron-right"></i></span>
        </li>


        {!! App\helpers\helper::bread($name, $menu) !!}

      </ul>
    </div>
  </div>
