<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                MENU
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menu/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menu/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                SẢN PHẨM
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/product/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>
                TIN TỨC
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/post/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/post/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-link"></i>
                <p>
                 KẾT NỐI
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/social/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm kết nối mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/social/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách kết nối</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                 TÀI KHOẢN CỦA TÔI
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/account/main/{{ \Auth::user()->id }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>thây đổi thông tin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/account/main/password/{{ \Auth::user()->id }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>thây đổi mật khẩu</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    @if (\Auth::user()->is_level == 1)
    <div class="mt-1 mb-1 p-1 bg-primary">
        <span>
            QUẢN TRỊ VIÊN
        </span>
    </div>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                 QUẢN LÝ TÀI KHOẢN
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/account/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm tài khoản mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/account/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách tài khoản</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    @endif

    <ul class="nav nav-pills nav-sidebar flex-column mt-2">
        <li class="nav-item">
            <a href="/admin/user/logout" class="nav-link" >
                <i class="nav-icon fas fa-sign-out-alt"></i>
                ĐĂNG NHẬP
            </a>
        </li>
    </ul>
</nav>
