@extends('admin.main')

@section('container')
    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên menu</label>
          <input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="Tên menu">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Danh mục menu</label>
            <select name="parent_id" class="form-control" id="">
                <option value="0" <?=$data->parent_id == 0 ? 'selected' : '' ?>>
                    __DANH MỰC CHA__
                </option>

                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" <?=$data->parent_id == $menu->id ? 'selected' : '' ?>>
                        {{ $menu->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái menu</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_status" value="1" id="yes_active" <?=$data->is_status == 1 ? 'checked' : '' ?>>
                <label class="form-check-label" for="yes_active">
                    Công Khai
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="is_status" id="no_active" <?=$data->is_status == 0 ? 'checked' : '' ?>>
                <label class="form-check-label" for="no_active">
                    Không Công Khai
                </label>
            </div>
        </div>

      </div>

      @csrf

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật menu</button>
      </div>
    </form>
@endsection
