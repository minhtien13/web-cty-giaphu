@extends('admin.main')

@section('container')
    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/product/slider/list/<?=$sliderId?>" class="text-dark"><i class="fas fa-th-list"></i></a>
    </div>

    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Xếp hạng</label>
            <input type="number" name="sort_by" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Hình đại diện sản phẩm</label>
            <input type="file" id="upload_file" class="form-control">
            <input type="text" class="d-none" name="thumb" id="thumb">
            <div class="main__upload__img mt-2">
                {{-- img --}}
            </div>
        </div>
      </div>

      @csrf

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm slider</button>
      </div>
    </form>
@endsection
