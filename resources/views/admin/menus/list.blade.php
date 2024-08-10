@extends('admin.main')

@section('container')
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
