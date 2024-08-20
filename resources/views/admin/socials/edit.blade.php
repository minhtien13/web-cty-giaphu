@extends('admin.main')

@section('container')

@include('admin.card')

<div class="d-flex justify-content-end mt-2 mb-3 px-2">
    <a href="/admin/social/list" class="text-dark"><i class="fas fa-th-list"></i></a>
</div>

<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên kết nối</label>
      <input type="text" name="name" value="{{ $social->name }}" class="form-control" id="exampleInputEmail1" placeholder="Tên kết nối">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Chọn kênh kết nối</label>
        <select name="is_type" class="form-control" id="">
            <option value="1" {{ $social->is_type == 1 ? 'selected': '' }}>FACEBOOK</option>
            <option value="2" {{ $social->is_type == 2 ? 'selected': '' }}>INSTAGAM</option>
            <option value="3" {{ $social->is_type == 3 ? 'selected': '' }}>YOUTUBE</option>
            <option value="4" {{ $social->is_type == 4 ? 'selected': '' }}>TWITTER</option>
            <option value="5" {{ $social->is_type == 5 ? 'selected': '' }}>TIKTOK</option>
            <option value="6" {{ $social->is_type == 6 ? 'selected': '' }}>ZALO</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Đường dẫn kết nối</label>
        <input type="text" name="is_link" value="{{ $social->is_link }}" class="form-control" id="exampleInputEmail1" placeholder="Đường dẫn kết nối">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Hình biểu tượng</label>
        <input type="file" id="upload_file" class="form-control">
        <input type="text" class="d-none" name="thumb" value="{{ $social->thumb }}"  id="thumb">
        <div class="main__upload__img mt-2">
           <img src="{{ $social->thumb }}" alt="">
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Trạng thái kết nối</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_status" value="1" id="yes_active"
            {{ $social->is_status == 1 ? 'checked': '' }}>
            <label class="form-check-label" for="yes_active">
                Công Khai
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="is_status" id="no_active"
            {{ $social->is_status == 0 ? 'checked': '' }}>
            <label class="form-check-label" for="no_active">
                Không Công Khai
            </label>
        </div>
    </div>

  </div>

  @csrf

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Cập nhật kết nối</button>
  </div>
</form>
@endsection
