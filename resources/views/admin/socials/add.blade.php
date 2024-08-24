@extends('admin.main')

@section('container')

<div class="mb-4 pr-2 d-flex justify-content-end">
    <a href="/admin/soclai/add" class="btn btn-success mr-2">
        <i class="fas fa-plus mr-1"></i>
        Tạo Mới
    </a>
    <a href="/admin/soclai/list" class="btn btn-primary">
        <i class="fas fa-th-list mr-1"></i>
        Danh Sách
    </a>
</div>

@include('admin.card')

<div class="d-flex justify-content-end mt-2 mb-3 px-2">
    <a href="/admin/social/list" class="text-dark"><i class="fas fa-th-list"></i></a>
</div>

<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên kết nối</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên kết nối">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Chọn kênh kết nối</label>
        <select name="is_type" class="form-control" id="">
            <option value="1">FACEBOOK</option>
            <option value="2">INSTAGAM</option>
            <option value="3">YOUTUBE</option>
            <option value="4">TWITTER</option>
            <option value="5">TIKTOK</option>
            <option value="6">ZALO</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Đường dẫn kết nối</label>
        <input type="text" name="is_link" class="form-control" id="exampleInputEmail1" placeholder="Đường dẫn kết nối">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Hình biểu tượng</label>
        <input type="file" id="upload_file" class="form-control">
        <input type="text" class="d-none" name="thumb" id="thumb">
        <div class="main__upload__img mt-2">
            {{-- img --}}
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Trạng thái kết nối</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_status" value="1" id="yes_active" checked>
            <label class="form-check-label" for="yes_active">
                Công Khai
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="is_status" id="no_active">
            <label class="form-check-label" for="no_active">
                Không Công Khai
            </label>
        </div>
    </div>

  </div>

  @csrf

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Tạo kết nối</button>
  </div>
</form>
@endsection
