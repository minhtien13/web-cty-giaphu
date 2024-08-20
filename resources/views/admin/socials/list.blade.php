@extends('admin.main')

@section('container')

@include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/social/add" class="text-dark"><i class="fas fa-th-plus"></i></a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>HÌNH</th>
                <th>TEN KẾT NỐI</th>
                <th>TRẠNG THÁI</th>
                <th>ĐƯỜNG DẪN</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($socials as $social)
                <tr>
                    <td><a href="#">#{{ $social->id }}</a></td>
                    <td>
                        <div class="main__social__image">
                            <img src="{{ $social->thumb }}" alt="">
                        </div>
                    </td>
                    <td>{{ $social->name }}</td>
                    <td>{!! App\helpers\helper::isStatus($social->is_status) !!}</td>
                    <td><a href="{{ $social->is_link }}" target="_blank"><i class="fas fa-link"></i></a></td>
                    <td>
                        <div class="main__editor">
                            <a href="/admin/social/edit/{{ $social->id }}" class="main__btn bg-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)" onclick="OnRemove('/admin/social/delete', {{ $social->id }})" class="main__btn bg-danger ml-2">
                            <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-3">
        {!! $socials->links() !!}
    </div>
@endsection
