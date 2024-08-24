@extends('admin.main')

@section('container')

    <div class="mb-4 pr-2 d-flex justify-content-end">
        <a href="/admin/menu/add" class="btn btn-success mr-2">
            <i class="fas fa-plus mr-1"></i>
            Tạo Mới
        </a>
        <a href="/admin/menu/list" class="btn btn-primary">
            <i class="fas fa-th-list mr-1"></i>
            Danh Sách
        </a>
    </div>


@include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/menu/add" class="text-dark"><i class="fas fa-plus"></i></a>
    </div>
    <table class="table">
        <tr>
            <th style="width: 40px;">ID</th>
            <th>TÊN MENU</th>
            <th>TRẠNG THÁI</th>
            <th>NGÀY CẬP NHẬT</th>
            <th>NGÀY TẠO</th>
            <th>&nbsp;</th>
        </tr>

        <?=\App\Helpers\helper::menuTable($menus)?>
    </table>
@endsection
