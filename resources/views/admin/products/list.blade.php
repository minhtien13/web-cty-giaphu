@extends('admin.main')

@section('container')
<div class="row mb-4 mt-3 pl-2 pr-2">
    <div class="col-4">
        <form action="" method="get">
            <div class="d-flex">
                <button class="btn btn-primary" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </button>
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </form>

    </div>
    <div class="col-8">
        <div class="d-flex justify-content-end">
            <a href="/admin/product/add" class="btn btn-success mr-2">
                <i class="fas fa-plus mr-1"></i>
                Tạo Mới
            </a>
            <a href="/admin/product/list" class="btn btn-primary">
                <i class="fas fa-th-list mr-1"></i>
                Danh Sách
            </a>
        </div>
    </div>
</div>


@include('admin.card')

    <div class="d-flex justify-content-end mt-2 mb-3 px-2">
        <a href="/admin/product/add" class="text-dark"><i class="fas fa-plus"></i></a>
    </div>
    @if (count($products) != 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 40px;">ID</th>
                    <th>HÌNH</th>
                    <th>TÊN SP</th>
                    <th>MENU</th>
                    <th>TRẠNG THÁI</th>
                    <th>SLIDER</th>
                    <th>NGÀY CẬP NHẬT</th>
                    <th>NGÀY TẠO</th>
                    <th>TK TẠO</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img class="main__table__product__image" src="{{ $product->thumb }}" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->menu->name }}</td>
                        <td>{!! App\helpers\helper::isStatus($product->is_status) !!}</td>
                        <td>
                            <a href="/admin/product/slider/add/{{ $product->id }}">
                                <i class="fas fa-upload"></i>
                            </a>
                        </td>
                        <td>{{ $product->updated_at }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td><a href="#">{{ $product->user->name }}</a></td>
                        <td>
                            <div class="main__editor">
                                <a href="/admin/product/edit/{{ $product->id }}" class="main__btn bg-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)" onclick="OnRemove('/admin/product/delete', {{ $product->id }})" class="main__btn bg-danger ml-2">
                                <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
@endsection
