@extends('main')

@section('container')
@include('menus.bread')
<div class="main__container">
    <div class="intro">
      <div class="container">
        <div class="intro__container">
          <h2 class="intro__heading">GIA PHU architects</h2>

          <div class="intro__content">
            <p class="intro__content-txt">Tiểu sử</p>

            <span>
              {!! $intro->content !!}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
