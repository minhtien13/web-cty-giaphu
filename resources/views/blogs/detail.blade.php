@extends('main')

@section('container')
<div class="bread">
    <div class="container">
      <ul class="bread__list">
        <li class="bread__list-item">
            <a href="/" class="bread__list-link">Trang chủ</a>
            <span><i class="fa-solid fa-chevron-right"></i></span>
        </li>
        <li class="bread__list-item">
            <a href="/tin-tuc.html" class="bread__list-link">Tin tức</a>
            <span><i class="fa-solid fa-chevron-right"></i></span>
        </li>
        <li class="bread__list-item">
            <p class="bread__list-link">{{ $post->title }}</p>
            <span><i class="fa-solid fa-chevron-right"></i></span>
        </li>
      </ul>
    </div>
</div>

<div class="blog">
    <div class="container-full">
      <div class="blog__container">
        <div class="blog__main">
            <div class="blog__main__post">
                <div class="blog__detail">
                    <h1 class="blog__detail__title">
                       {{ $post->title }}
                    </h1>
                    <div class="blog__detail__image">
                        <img src="{{ $post->thumb }}" alt="gia phu">
                    </div>
                    <div class="blog__detail__desc">
                        <h5 class="blog__detail__heading">Mô tả</h5>
                        <span>
                            {{ $post->description }}
                        </span>
                    </div>
                    <div class="blog__detail__content">
                        <h5 class="blog__detail__heading">Chi tiết bài viết</h5>
                       <div class="blog__detail__content-txt">
                        {!! $post->title !!}
                       </div>
                    </div>
                </div>
            </div>

           @include('blogs.sidebar')
        </div>
      </div>
    </div>
  </div>
@endsection
