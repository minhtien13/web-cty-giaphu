@extends('main')

@section('container')

@include('menus.bread')

<section class="main">
    <div class="main__container">
      <div class="product">
        <div class="container">
          <div class="product__service">
            @include('products.sidebar')
            <div class="product__service__wrapper">
                @if (count($products) != 0)
                    <div class="product__service__main">
                        <ul class="product__service__main__list">
                            @foreach ($products as $product)

                            <li class="product__service__main__list-item">
                                <div class="product__wrapper">
                                <div class="product__wrapper__ima">
                                    <img src="/template/asset/images/logo.jpg" alt="gia-phu-architects" class="product__wrapper__logo">

                                    <img src="{{ $product->thumb }}" alt="gia phu Architects" class="product__wrapper__image">
                                    @if ($product->price != 0)
                                        <div class="product__wrapper__price">
                                            <p>{{ App\helpers\helper::headLePrice($product->price) }}</p>
                                        </div>
                                    @else
                                        <div class="product__wrapper__price">
                                            <p> LH: {{ $contact->phone }}</p>
                                        </div>
                                    @endif


                                </div>
                                <div class="product__wrapper__info">
                                    <a href="/dich-vu/{{ $product->is_link }}" class="product__wrapper__info-title">
                                    <h2>
                                        {{ $product->title }}
                                    </h2>
                                    </a>
                                    <div class="product__wrapper__content">
                                    <span class="product__wrapper__info-desc">
                                        {{ $product->description }}
                                    </span>

                                    <p class="product__wrapper__info-phone">
                                        ĐT: {{ $contact->phone }}
                                    </p>
                                    </div>
                                </div>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>

                    <div class="product__page">
                        {!! $products->links() !!}
                    </div>
               @else
                <div class="product__main__post--empty">
                    <p>
                       Danh mực đang cập nhật sản phẩm mới...
                    </p>
                </div>
               @endif


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
