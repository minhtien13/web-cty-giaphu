
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Admin.head')
</head>
<body class="hold-transition sidebar-mini">

<div class="pt-2 pb-2 bg-info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <p class="m-0">Admin: <a href="/admin/user/logout" class="text-light link-danger">Đăng xuất</a></p>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end align-items-center">
                    <span class="main__tabbar-name text-capitalize">{{ \Auth::user()->name }}</span>
                    <div class="ml-2">
                        <img src="/template/admin/asset/dist/img/user2-160x160.jpg" height="30" width="30" class="img-circle elevation-2" alt="User Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
  <!-- Navbar -->
  @include('Admin.header')
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      @include('admin.nav')
    </div>
  </aside>



  <div class="content-wrapper mt-4">
      <section class="content">
        @include('admin.alert')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
             @yield('container')
            </div>
        </div>
      </div>
    </section>
  </div>

  @include('admin.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/template/admin/asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/template/admin/asset/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/template/admin/asset/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/admin/asset/dist/js/demo.js"></script>

{{-- js config --}}
<script src="/template/admin/asset/js/main.js"></script>
<script src="/template/admin/asset/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
