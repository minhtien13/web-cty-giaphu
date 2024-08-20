@extends('admin.main')

@section('container')

    @include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/menu/list" class="text-dark"><i class="fas fa-th-list"></i></a>
    </div>

    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên menu</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên menu">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Danh mục menu</label>
            <select name="parent_id" class="form-control" id="">
                <option value="0">__DANH MỰC CHA__</option>

                <?=\App\Helpers\helper::menus($menus)?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái menu</label>
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
        <button type="submit" class="btn btn-primary">Tạo menu</button>
      </div>
    </form>
@endsection
