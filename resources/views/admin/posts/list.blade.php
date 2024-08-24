@extends('admin.main')

@section('container')

<div class="mb-4 pr-2 d-flex justify-content-end">
    <a href="/admin/post/add" class="btn btn-success mr-2">
        <i class="fas fa-plus mr-1"></i>
        Tạo Mới
    </a>
    <a href="/admin/post/list" class="btn btn-primary">
        <i class="fas fa-th-list mr-1"></i>
        Danh Sách
    </a>
</div>

@include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/post/add" class="text-dark"><i class="fas fa-plus"></i></a>
    </div>
    @if (count($posts) != 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 40px;">ID</th>
                    <th>HÌNH</th>
                    <th>TIÊU ĐỀ BÀI VIẾT</th>
                    <th>TRẠNG THÁI</th>
                    <th>NGÀY CẬP NHẬT</th>
                    <th>NGÀY TẠO</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <img class="main__table__product__image" src="{{ $post->thumb }}" alt="">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{!! App\helpers\helper::isStatus($post->is_status) !!}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <div class="main__editor">
                                <a href="/admin/post/edit/{{ $post->id }}" class="main__btn bg-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)" onclick="OnRemove('/admin/post/delete', {{ $post->id }})" class="main__btn bg-danger ml-2">
                                <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
