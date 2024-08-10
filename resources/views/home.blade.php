@extends('main')

@section('container')

@include('banner')

<section class="main">
    <div class="main__container">
      <div class="directory">
        <div class="container">
          <ul class="directory__list">
            <li class="directory__list-item">
              <div class="directory__container">
                <img
                  src="/template/asset/images/ima1.PNG"
                  alt=""
                  class="directory__container-image"
                />
                <div class="directory__container-info">
                  <span class="directory__container-txt">Tư vấn</span>
                  <span class="directory__container-txt">Miễn phí</span>
                </div>
              </div>
            </li>
            <li class="directory__list-item">
              <div class="directory__container">
                <img
                  src="/template/asset/images/ima2.PNG"
                  alt=""
                  class="directory__container-image"
                />
                <div class="directory__container-info">
                  <span class="directory__container-txt">Thi công</span>
                  <span class="directory__container-txt">Trọn gối</span>
                </div>
              </div>
            </li>
            <li class="directory__list-item">
              <div class="directory__container">
                <img
                  src="/template/asset/images/ima3.PNG"
                  alt=""
                  class="directory__container-image"
                />
                <div class="directory__container-info">
                  <span class="directory__container-txt">
                    Cam kết dịch vụ
                  </span>
                  <span class="directory__container-txt"> tốt </span>
                </div>
              </div>
            </li>
            <li class="directory__list-item">
              <div class="directory__container">
                <img
                  src="/template/asset/images/ima4.PNG"
                  alt=""
                  class="directory__container-image"
                />
                <div class="directory__container-info">
                  <span class="directory__container-txt">Bảo hành</span>
                  <span class="directory__container-txt">3 năm</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="outstanding__product">
        <div class="container">
          <ul class="outstanding__product__list">
            <li class="outstanding__product__item">
              <div class="outstanding__product__wrapper">
                <img
                  src="https://tostemvietnam.com/wp-content/uploads/2023/06/nha-pho-dep-14-1.png"
                  alt=""
                  class="outstanding__product__image"
                />
              </div>
            </li>
            <li class="outstanding__product__item">
              <div class="outstanding__product__wrapper">
                <img
                  src="https://vinavic.vn/images/projects/2024/01/03/resized/mau-biet-thu-pho-hien-dai-mat-tien-10m-sau-25m-4-tang-bt2329-1_1704252146.jpg"
                  alt=""
                  class="outstanding__product__image"
                />
              </div>
            </li>
            <li class="outstanding__product__item">
              <div class="outstanding__product__wrapper">
                <img
                  src="https://noithatahome.vn/wp-content/uploads/Thiet-ke-san-vuon-voi-su-ket-hop-cua-nhieu-tieu-canh.jpg"
                  alt=""
                  class="outstanding__product__image"
                />
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="product-all">
        <div class="container">
          <h3 class="product__heading"><span>nội bật</span></h3>
          @if (count($products) != 0)
               @include('products.loo')
          @else
            <div class="product__main__post--empty">
                <p>
                    Đang cập nhật sản phẩm...
                </p>
            </div>
          @endif

        </div>
      </div>

      @include('products.list')

    </div>
  </section>
@endsection
