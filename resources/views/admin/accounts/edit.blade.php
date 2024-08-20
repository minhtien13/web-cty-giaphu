@extends('admin.main')

@section('container')

    @include('admin.card')

<div class="d-flex justify-content-end mt-2 mb-3 px-2">
    <a href="/admin/account/list" class="text-dark mr-2"><i class="fas fa-th-list"></i></a>
    <a href="/admin/account/add" class="text-dark"><i class="fas fa-plus"></i></a>
</div>

<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên tài khoản</label>
      <input type="text" name="name" class="form-control" value="{{ $account->name }}" id="exampleInputEmail1" placeholder="Nhập tên tài khoản">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Cấp quyền cho tài khoản</label>
        <select name="is_level" class="form-control">
            <option value="2" {{ $account->is_level == 2 ? 'selected' : '' }}>Tài khoản admin</option>
            <option value="1" {{ $account->is_level == 1 ? 'selected' : '' }}>Tài khoản quản trị</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tên người dùng <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" value="{{ $account->email }}" id="exampleInputEmail1" placeholder="Nhập tên người dùng">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Mật khẩu mới</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Mật khẩu mới xác nhận</label>
        <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Gmail <span class="text-danger">*</span></label>
        <input type="email" name="info_email" class="form-control" value="{{ $account->info_email }}" id="exampleInputEmail1" placeholder="Nhập gmail">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại </label>
        <input type="text" name="phone" class="form-control" value="{{ $account->phone }}" id="exampleInputEmail1" placeholder="Nhập số điện thoại">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Trạng tài khoản</label>
        <select name="is_status" class="form-control">
            <option value="1" {{ $account->is_status == 1 ? 'selected' : '' }}>Kích hoạt tài khoản</option>
            <option value="0" {{ $account->is_status == 0 ? 'selected' : '' }}> Không Kích hoạt tài khoản</option>
        </select>
    </div>

  </div>

  @csrf

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
  </div>
</form>
@endsection
