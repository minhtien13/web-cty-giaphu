<div class="blog__main__sidebar pc-on-show--flex moblie-on-hide ">
    <div class="blog__main__sidebar__war">
        <h3 class="blog__main__sidebar--heading">Tìm kiếm bài viết</h3>
        <div class="blog__main__sidebar__search">
            <form action="">
                <input type="text" name="tin_tuc" placeholder="Tìm kiếm">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="blog__main__sidebar__war">
        <h3 class="blog__main__sidebar--heading">Danh mực sản phẩm</h3>
        <div class="blog__main__sidebar__list">
            <ul>
                @foreach ($menus as $menu)
                    <li>
                        <a href="/danh-muc/{{ $menu->id }}-{{ \Str::slug($menu->name) }}">
                            {{ $menu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="blog__main__sidebar__war">
        <div class="blog__main__sidebar__logo">
          <img src="/template/asset/images/gia-phu-architects.jpg" alt="giaphu">
        </div>
    </div>

    <div class="blog__main__sidebar__war">
        <h3 class="blog__main__sidebar--heading">Sản phâm của chung tôi</h3>
        <div class="blog__main__product">
            <ul class="blog__main__product__list">
                @foreach ($products as $product)
                    <li class="product__list-item">
                        <div class="product__wrapper">
                            <div class="product__wrapper__ima">
                                <img
                                src="/template/asset/images/logo.jpg"
                                alt="gia-phu-architects"
                                class="product__wrapper__logo"
                                />

                                <img
                                src="{{ $product->thumb }}"
                                alt="gia phu Architects"
                                class="product__wrapper__image"
                                />
                            </div>

                            <div class="product__wrapper__info">
                                <a href="/dich-vu/{{ $product->is_link }}" class="product__wrapper__info-title">
                                <h2>{{ $product->title }}</h2>
                                </a>
                                <div class="product__wrapper__content">
                                <span class="product__wrapper__info-desc">
                                    {{ $product->description }}
                                </span>

                                <div class="product__wrapper__info-buttom">
                                    <a href="/dich-vu/{{ $product->is_link }}.html" class="product__wrapper__info-btn btn">
                                    Xem thêm <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="blog__main__sidebar__war">
        <h3 class="blog__main__sidebar--heading">Menu</h3>
        <div class="blog__main__sidebar__list">
            <ul>
                <li>
                    <a href="/">
                        Trang Chủ
                    </a>
                </li>
                <li>
                    <a href="/dich-vu">
                        Dịch vụ
                    </a>
                </li>
                <li>
                    <a href="/tin-tuc">
                        Tin Tức
                    </a>
                </li>
                <li>
                    <a href="/gioi-thieu">
                        Giới Thiệu
                    </a>
                </li>
                <li>
                    <a href="/lien-he">
                        Liên Hệ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
