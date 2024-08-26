@extends('admin.main')

@section('container')

    @include('admin.card')

    <div class="container mt-3 pb-3">
        <div class="row">
            <div class="col-8">
                <p>Thông Tin Liên Hệ Của Cty</p>
                <div class="mb-2">
                    <b>Số điện thoại:</b>
                    <span>{{ $contact->phone }}</span>
                </div>
                <div class="mb-2">
                    <b>Gmail:</b>
                    <span>{{ $contact->email }}</span>
                </div>
                <div class="mb-4">
                    <b>Địa Chỉ của cty:</b>
                    <span>{{ $contact->address }}</span>
                </div>
                <div class="pb-2">
                    <a href="/admin/contact/edit/{{ $contact->id }}" class="text-primary">Thay đổi</a>
                    <a href="javacript:void(0)" onclick="OnRemove('/admin/contact/delete', {{ $contact->id }})" class="text-danger ml-2">Xóa</a>
                </div>
            </div>

            @include('admin.contacts.menu')
        </div>
    </div>
@endsection
