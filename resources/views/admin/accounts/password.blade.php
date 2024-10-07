@extends('admin.main')

@section('container')
@include('admin.card')

<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
          <label for="exampleInputEmail1">Mật khẩu <span class="text-danger">*</span></label>
          <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mật khẩu xác nhận <span class="text-danger">*</span></label>
        <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
      </div>

    @csrf

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">cập nhật</button>
    </div>
  </form>
@endsection
