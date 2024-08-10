@extends('main')

@section('container')
@include('menus.bread')
<div class="main__container">
    <div class="contact">
      <div class="contact__head">
        <div class="container">
          <h5 class="contact__heading">liên hệ</h5>
        </div>
      </div>
      <div class="container">
        <div class="contact__container">
          <div class="contact__main">
            <div class="contact__main__wrapper">
              <div class="contact__main__logo">
                <img class="contact__main__logo-image" src="/template/asset/images/gia-phu-architects.jpg" alt="">
              </div>
            </div>
            <div class="contact__main__wrapper">
              <div class="contact__main__info">
                <p class="contact__main__info-txt">thông tin liên hệ</p>
                <ul>
                  <li>
                    <span class="contact__main__info-icon">
                      <i class="fa-solid fa-phone"></i>
                    </span>
                    <span>{{ $contact->phone }}</span>
                  </li>
                  <li>
                    <span class="contact__main__info-icon">
                      <i class="fa-solid fa-envelope"></i>
                    </span>
                    <span>{{ $contact->email }}</span>
                  </li>
                  <li>
                    <span class="contact__main__info-icon">
                      <i class="fa-brands fa-facebook-f"></i>
                    </span>
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100089547589444"> GIA PHÚ ARCHITECTS </a>
                  </li>
                  <li>
                    <span class="contact__main__info-icon">
                      <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <span>
                        {{ $contact->address }}
                    </span>
                  </li>
                </ul>

                <p class="contact__main__info-txt">kết nối</p>
                <div class="contact__main__social">
                  <ul>
                    <li>
                      <a href="#">
                        <img src="/template/asset/images/Facebook.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img src="/template/asset/images/instagam.PNG" alt="">
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
