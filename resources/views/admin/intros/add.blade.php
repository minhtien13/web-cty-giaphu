@extends('admin.main')

@section('container')

@include('admin.card')

<div class="d-flex justify-content-end mt-2 mb-3 px-2">
    <a href="/admin/contact/list" class="text-dark"><i class="fas fa-th-list"></i></a>
</div>

<form action="" method="POST">
  <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả ngắn về cty</label>
            <textarea type="text" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tiểu sử về cty</label>
            <textarea type="text" name="content" class="form-control"></textarea>
        </div>
  </div>

  @csrf

  <p class="pl-4 pr-4">
    <span class="text-danger">Lưu ý</span> khi tạo trang giới thiệu chỉ sử dụng được một trang duy nhất trên website này
  </p>

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Tạo trang giới thiệu</button>
  </div>
</form>
@endsection
