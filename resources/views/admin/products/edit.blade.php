@extends('admin.main')

@section('container')

<div class="mb-4 pr-2 d-flex justify-content-end">
    <a href="/admin/product/add" class="btn btn-success mr-2">
        <i class="fas fa-plus mr-1"></i>
        Tạo Mới
    </a>
    <a href="/admin/product/list" class="btn btn-primary">
        <i class="fas fa-th-list mr-1"></i>
        Danh Sách
    </a>
</div>

@include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/product/list" class="text-dark"><i class="fas fa-th-list"></i></a>
    </div>

    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên sản phẩm</label>
          <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="is_title" placeholder="Tên sản phẩm">
          <input type="text" hidden name="is_link" id="is_url" value="{{ $product->is_link }}">
          <div class="mt-1 d-none" id="is_link">
            <b>Đường dãn:</b> <span >abc</span>
          </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Giá sản phẩm</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả ngắn</label>
            <textarea type="text" name="description" class="form-control" >
                {{ $product->description }}
            </textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chọn menu</label>
            <select name="menu_id" class="form-control" id="">
                @foreach ($menus as $menu)
                     <option value="{{ $menu->id }}" <?=$product->menu_id == $menu->id ? 'selected' : '' ?>>
                        {{ $menu->name  }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Chi tiết</label>
            <textarea type="text" name="content" class="form-control" id="content">
                {{ $product->content }}
            </textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Hình đại diện sản phẩm</label>
            <input type="file" id="upload_file" class="form-control">
            <input type="text" class="d-none" name="thumb" id="thumb" value="{{ $product->thumb }}">
            <div class="main__upload__img mt-2">
                <img src="{{ $product->thumb }}" alt="">
            </div>
        </div>



        <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái sản phẩm</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_status" {{ $product->is_status == 1 ? 'checked': '' }} value="1" id="yes_active">
                <label class="form-check-label" for="yes_active">
                    Công Khai
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="is_status" {{ $product->is_status == 0 ? 'checked': '' }} id="no_active">
                <label class="form-check-label" for="no_active">
                    Không Công Khai
                </label>
            </div>
        </div>

      </div>

      @csrf

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
      </div>
    </form>
@endsection
