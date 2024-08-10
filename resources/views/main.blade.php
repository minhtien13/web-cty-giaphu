<!DOCTYPE html>
<html lang="vi">
  <head>
     @include('head')
  </head>
  <body>
    <div class="app">
       @include('search')

       @include('header')

       @yield('container')

       @include('footer')
    </div>

    <button class="backtop backtop-hide btn pc-on-hide">
      <i class="fa-solid fa-chevron-up"></i>
    </button>
  </body>

  <script src="/template/asset/js/jquery.min.js"></script>
  <script src="/template/asset/js/all.js"></script>
  <script src="/template/asset/js/main.js"></script>
</html>
