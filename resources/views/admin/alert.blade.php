@if (\Session::get('error'))
<div class="alert alert-danger" role="alert">
    {{ \Session::get('error') }}
</div>
@endif

@if (\Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ \Session::get('success') }}
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
       @endforeach
    </ul>
</div>
@endif

<div class="alert d-none" id="show_alert" role="alert">
    <span class="show_alert_txt">Đã xóa menu thành công</span>
</div>
