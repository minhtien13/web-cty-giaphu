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


    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/account/add" class="text-dark"><i class="fas fa-plus"></i></a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN TK</th>
                <th>TRẠNG THÁI</th>
                <th>TT TÀI KHOẢN</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>
                    <a href="#">#{{ $account->id }}</a>
                </td>
                <td>{{ $account->name }}</td>
                <td>{!! App\helpers\helper::isStatus($account->is_status) !!}</td>
                <td>
                    <a href="/admin/account/info/{{ $account->id }}">
                        thông tin tài khoản
                    </a>
                </td>
                <td>
                    <div class="main__editor">
                        <a href="/admin/account/password/{{ $account->id }}" class="main__btn bg-primary">
                            <i class="fas fa-lock"></i>
                        </a>

                        <a href="/admin/account/edit/{{ $account->id }}" class="main__btn bg-primary ml-2">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="javascript:void(0)" onclick="OnRemove('/admin/account/delete', {{ $account->id }})" class="main__btn bg-danger ml-2">
                        <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
