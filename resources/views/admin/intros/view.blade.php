@extends('admin.main')

@section('container')

@include('admin.card')

<div class="container mt-3">
    <div class="row">
        <div class="col-8">
            <div class="p-2">
                <p class="mb-1">Mô tả ngắn về công ty</p>
                <span>
                   {{ $intro->description }}
                </span>
            </div>

            <div class="p-2">
                <p class="mb-1">Tiểu sử về công ty</p>
                <span>
                    {!! $intro->content !!}
                </span>
            </div>

            <div class="pb-2">
                <a href="/admin/intro/edit/{{ $intro->id }}" class="text-primary">Thay đổi</a>
                <a href="javacript:void(0)" onclick="OnRemove('/admin/intro/delete', {{ $intro->id }})" class="text-danger ml-2">Xóa</a>
            </div>
        </div>

        @include('admin.contacts.menu')
    </div>
</div>
@endsection
