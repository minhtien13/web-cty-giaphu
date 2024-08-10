@extends('admin.main')

@section('container')
<div class="d-flex justify-content-end mt-2 mb-3 px-2">
    <a href="/admin/contact/list" class="text-dark"><i class="fas fa-th-list"></i></a>
</div>

<form action="" method="POST">
  <div class="card-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại của cty</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại của cty">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ gmail của cty</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ gmail của cty">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ của cty</label>
        <textarea type="text" name="address" class="form-control"></textarea>
    </div>

  </div>

  @csrf

  <p class="pl-4 pr-4">
    <span class="text-danger">Lưu ý</span> trang liên hệ này chỉ tạo được một trang duy nhất
  </p>

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Tạo liện hệ</button>
  </div>
</form>
@endsection
