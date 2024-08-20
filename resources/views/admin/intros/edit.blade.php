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
            <textarea type="text" name="description" class="form-control">
                {{ $intro->description }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tiểu sử về cty</label>
            <textarea type="text" name="content" class="form-control">
                {!! $intro->content !!}
            </textarea>
        </div>
  </div>

  @csrf


  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập nhật trang giới thiệu</button>
  </div>
</form>
@endsection
