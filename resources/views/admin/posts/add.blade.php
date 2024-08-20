@extends('admin.main')

@section('container')

    @include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/post/list" class="text-dark"><i class="fas fa-th-list"></i></a>
    </div>

    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tiêu đề bài viết</label>
          <input type="text" name="title" class="form-control" placeholder="Tiêu đề bài viết">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả ngắn bài viết</label>
            <textarea type="text" name="description" class="form-control" ></textarea>
        </div>

        <div class="form-group">
            <label>Nội dung bài viết</label>
            <textarea type="text" name="content" class="form-control" id="content"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Hình đại diện bài viết</label>
            <input type="file" id="upload_file" class="form-control">
            <input type="text" class="d-none" name="thumb" id="thumb">
            <div class="main__upload__img mt-2">
                {{-- img --}}
            </div>
        </div>



        <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái bài viết</label>
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
        <button type="submit" class="btn btn-primary">Tạo bài viết</button>
      </div>
    </form>
@endsection
