@extends('admin.main')

@section('container')

<div class="mb-4 pr-2 d-flex justify-content-end">
    <a href="/admin/account/add" class="btn btn-success mr-2">
        <i class="fas fa-plus mr-1"></i>
        Tạo Mới
    </a>
    <a href="/admin/account/list" class="btn btn-primary">
        <i class="fas fa-th-list mr-1"></i>
        Danh Sách
    </a>
</div>

@include('admin.card')

<div class="pt-3">
    <ul>
        <li><b>Tên:</b> {{ $account->name }}</li>
        <li><b>Tên người dùng:</b> {{ $account->email }}</li>
        <li><b>Gmail:</b> {{ $info->info_email }}</li>
        <li><b>Ngày tạo tài khoản:</b> {{ $info->date_register }}</li>
        <li>
            <b>Ngày được phép hoạt động:</b>
            {{ $info->date_active != '' ?  $info->date_active : 'Chưa cho phép được hoạt động' }}
        </li>
        <li>
            <b>Ngày đăng nhập:</b>
            {{ $info->date_login != '' ?  $info->date_login : 'Chưa cho phép được đăng nhập lần nào hêt' }}
        </li>
        <li><b>Tài khoản đăng ký:</b> {{ $user ? $user->name : "tài khoản cá nhân tự đăng ký" }}</li>
    </ul>
</div>
@endsection
