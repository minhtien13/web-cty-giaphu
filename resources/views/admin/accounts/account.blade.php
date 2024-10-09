@extends('admin.main')

@section('container')


    @include('admin.card')


<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên tài khoản</label>
      <input type="text" name="name" class="form-control" value="{{ $account->name }}" id="exampleInputEmail1" placeholder="Nhập tên tài khoản">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tên người dùng <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" value="{{ $account->email }}" id="exampleInputEmail1" placeholder="Nhập tên người dùng">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại </label>
        <input type="text" name="phone" class="form-control" value="{{ $account->phone }}" id="exampleInputEmail1" placeholder="Nhập số điện thoại">
    </div>

  </div>

  @csrf

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
  </div>
</form>
@endsection
