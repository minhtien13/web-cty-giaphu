<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/template/admin/user/assets/css/main.css" />
  </head>
  <body>
    <div class="admin-form">
      <div class="admin-form__main">
        <h2 class="admin__heading">Đăng nhập vào cty</h2>
        <p class="admin__text">
          Bạn có chưa tài khoản <a href="/admin/user/register">đăng ký tại đây</a>
        </p>
        <div class="admin-form__container">
            @if (Session::has('error'))
                <p class="message message__danger">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="message message__success">{{ Session::get('success') }}</p>
            @endif

          <form action="" method="post">
            <div class="admin-form__row">
              <label for="">Gmail / Số điện thoại</label>
              <input type="text" name="email" class="{{ !$errors->first('email') ? '' : 'border-danger'; }}" />
              @if ($errors->first('email'))
                <p class="message_error">{{ $errors->first('email') }}</p>
              @endif
            </div>

            <div class="admin-form__row">
              <label for="">Mật Khẩu</label>
              <input type="password" name="password" class="{{ !$errors->first('password') ? '' : 'border-danger'; }}"  />
              @if ($errors->first('password'))
                <p class="message_error">{{ $errors->first('password') }}</p>
              @endif
            </div>

            <div class="admin-form__row checkbox">
              <input type="checkbox" id="checkbox" name="renamer"  value="1" />
              <label for="checkbox">Ghi nhớ tôi</label>
            </div>

            <div class="admin-form__row">
              <button class="btn-primary">Đăng nhập</button>
            </div>

            @csrf
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
