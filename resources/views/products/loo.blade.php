
<ul class="product__list">
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
