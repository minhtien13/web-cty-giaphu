@extends('admin.main')

@section('container')
    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/product/slider/add/<?=$sliderId?>" class="text-dark"><i class="fas fa-plus"></i></a>
    </div>

    @if (count($sliders) != 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 40px;">ID</th>
                    <th>HÌNH SLIDER</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>XẾP HẠNG</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img class="main__table__product__image" src="{{ $slider->thumb }}" alt="">
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->sort_by }}</td>
                        <td>
                            <div class="main__editor">
                                <a href="javascript:void(0)" onclick="OnRemove('/admin/product/slider/delete', {{ $slider->id }})" class="main__btn bg-danger ml-2">
                                <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


@endsection
