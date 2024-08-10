@extends('main')

@section('container')

@include('menus.bread')

<div class="blog">
    <div class="container-full">
      <div class="blog__container">
        <div class="blog__main">
            <div class="blog__main__post">
                <h3 class="blog__main__post--heading">{{ $searchTitle }}</h3>
                @if (count($posts) != 0)
                <div class="blog__list">
                    @foreach ($posts as $post)
                        <div class="blog__list-item">
                            <div class="blog__wrapper">
                            <div class="blog__image">
                                <img src="{{ $post->thumb }}" alt="">
                            </div>
                            <div class="blog__info">
                                <a href="/bai-viet/{{ $post->is_link }}">
                                    <h2 class="blog__info-heading">{{ $post->title }}</h2>
                                </a>

                                <span class="blog__info-content">
                                    {{ $post->description }}
                                </span>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($posts->links())
                    <div class="product__page">
                        <nav>
                            <ul class="pagination">
                                {{ $posts->links() }}
                            </ul>
                        </nav>
                    </div>
                @endif

                @else
                    <div class="blog__main__post--empty">
                        <p>
                            Không Có Bài Viết Nào Hết...
                        </p>
                    </div>
                @endif
            </div>

           @include('blogs.sidebar')
        </div>


        <div class="blog__contact">
          <div class="blog__contact__logo">
            <img src="/template/asset/images/gia-phu-architects.jpg" alt="giaphu">
          </div>

          <div class="blog__contact__info">
            <ul>
              <li>
                <a href="#">
                  <i class="fa-solid fa-phone"></i> {{ $contact->phone }}
                </a>
              </li>
              <li>
                <span>
                  <i class="fa-solid fa-envelope"></i>
                  {{ $contact->email }}
                </span>
              </li>
              <li>
                <span>
                  <i class="fa-solid fa-location-dot"></i>
                  {{ $contact->address }}
                </span>
              </li>
            </ul>

            <div class="blog__contact__info-description">
              <p>
              {{ $intro->description }}
              </p>
            </div>

            <div class="blog__contact__info__soclai">
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
                <li>
                  <a href="#">
                    <img src="/template/asset/images/Facebook.jpg" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
