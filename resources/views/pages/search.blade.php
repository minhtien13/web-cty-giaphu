@extends('main')

@section('container')
<section class="main">
    <div class="main__container">
        <div class="product-all">
            <div class="container">
                <h2 class="search__heading">Tìm Kiếm Kết Quả</h2>
                @if (count($products) != 0)
                     @include('products.loo')
                @else
                    <div class="search__main__post--empty">
                        <p>
                            Không Có Sản Phẩm Nào Hết...
                        </p>
                    </div>
                @endif

            </div>
      </div>
    </div>
  </section>
@endsection
