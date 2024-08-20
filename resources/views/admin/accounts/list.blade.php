@extends('admin.main')

@section('container')

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
                    <a href="/admin/account/info/{{ $account->id }}"><i class="fas fa-window-maximize"></i></a>
                </td>
                <td>
                    <div class="main__editor">
                        <a href="/admin/account/edit/{{ $account->id }}" class="main__btn bg-primary">
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
