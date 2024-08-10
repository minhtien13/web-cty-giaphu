@extends('main')

@section('container')
@include('menus.bread')

<div class="main__container">
    <div class="detall">
      <div class="container">
        <div class="detall__container">
          <div class="detall__container__wrapper">
            <div class="detall__left">
              <h3 class="detall__info--title detall__info--title__rp--2 pc-on-hide moblie-on-show">
                {{ $product->title }}
              </h3>

              <div class="detall__ima">
                <img src="{{ $product->thumb }}" alt="gia phu architects" class="detall__ima--img">
              </div>

              <div class="detall__left__main">
                <ul>
                  <li class="slider__item active" id="slider_item_0" onclick="changeImageDetail(0, '{{ $product->thumb }}')">
                    <img src="{{ $product->thumb }}" alt="">
                  </li>

                  @foreach ($sliders as $key => $slider)
                  <li class="slider__item" id="slider_item_{{ $key + 1 }}"  onclick="changeImageDetail({{ $key + 1 }}, '{{ $slider->thumb }}')">
                    <img src="{{ $slider->thumb }}" alt="">
                  </li>
                  @endforeach

                </ul>
              </div>
            </div>
          </div>
          <div class="detall__container__wrapper">
            <div class="detall__info">
              <h1 class="detall__info--title detall__info--title--2 pc-on-show moblie-on-hide">
                {{ $product->title }}
              </h1>

              <div class="detall__info__contact">
                <p class="detall__info__contact--txt red">
                  Liên hệ với chung tôi
                </p>
                <ul>
                  <li>
                    <span class="detall__info__contact-icon">
                      <i class="fa-solid fa-phone"></i>
                    </span>
                    <span class="red">{{ $contact->phone }}</span>
                  </li>
                  <li>
                    <span class="detall__info__contact-icon">
                      <i class="fa-solid fa-envelope"></i>
                    </span>
                    <span>{{ $contact->email }}</span>
                  </li>
                  <li>
                    <span class="detall__info__contact-icon">
                      <i class="fa-brands fa-facebook-f"></i>
                    </span>
                    <a href="#"> GIA PHÚ ARCHITECTS </a>
                  </li>
                  <li>
                    <span class="detall__info__contact-icon">
                      <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <span>
                        {{ $contact->address }}
                    </span>
                  </li>
                </ul>
              </div>
              <div class="detall__info__desction">
                <p class="detall__info__contact--txt">Mô tả</p>

                <span>
                    {{ $product->description }}
                </span>
              </div>

              <div class="detall__info__button">
                <p class="detall__info__contact--txt">Đặt lịch tư vấn</p>
                <button class="detall__info__button--btn btn">
                  Đặt lịch
                </button>
              </div>
            </div>
          </div>

          <div class="detall__content">
            <h4 class="detall__content--heading">Chi tiết</h4>

            <div class="detall__content--txt">
                {!! $product->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
