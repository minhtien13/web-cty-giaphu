@foreach ($menus as $menu)
@php
    $template =  App\helpers\helper::loadProductMenu($menu->id);
@endphp

@if ($template)
    <div class="product">
        <div class="container">
            <h3 class="product__heading"><span>{{ $menu->name }}</span></h3>
            {!! $template !!}
        </div>
    </div>
@endif

@endforeach
