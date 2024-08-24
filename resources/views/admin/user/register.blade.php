
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/template/admin/user/assets/css/main.css" />
  </head>
  <body>
    <div class="register">
      <div class="register__main">
        <div class="register__form">
          <h3 class="register__heading">Đăng Ký Tài Khoản</h3>
          <p class="register__txt">Gia Phú</p>
          <p class="admin__text">
            Bạn có chưa tài khoản <a href="/admin/user/login">đăng nhập tại đây</a>
          </p>
          @if (Session::has('error'))
          <p class="message message__danger">{{ Session::get('error') }}</p>
          @endif
          <form action="" method="post">
            <div class="register__container">
              <div class="register__row">
                <label for="">Tên tài khoản</label>
                <input type="text" name="name" placeholder="Nhập tên tài khoản" />
                @if ($errors->first('name'))
                    <p class="message_error">{{ $errors->first('name') }}</p>
                @endif
              </div>

              <div class="register__row">
                <label for="">Tên người dùng</label>
                <input type="email" name="email" placeholder="Nhập tên người dùng" />
                @if ($errors->first('email'))
                    <p class="message_error">{{ $errors->first('email') }}</p>
                @endif
              </div>

              <div class="register__row">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" placeholder="Nhập mật khâu" />
                @if ($errors->first('password'))
                    <p class="message_error">{{ $errors->first('password') }}</p>
                @endif
              </div>

              <div class="register__row">
                <label for="">Mật khẩu xác nhận</label>
                <input type="password" name="password_confirmation" placeholder="Nhập mật khâu xác nhận" />
              </div>
              <div class="register__row">
                  <label for="">Dịa chỉ gmail</label>
                  <input type="email" name="info_email" placeholder="Nhập dịa chỉ gmail" />
                  @if ($errors->first('info_email'))
                    <p class="message_error">{{ $errors->first('info_email') }}</p>
                  @endif
              </div>

              <div class="register__row">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" placeholder="Nhập số điện thoại" />
              </div>

              @csrf

              <div class="admin-form__row">
                <button class="btn-register btn-primary">Đăng ký</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
