<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin 24H</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/admin/dist/img/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">Alexander Pierce</a>
                <a style="font-size: 12px;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">BẢNG ĐIỀU KHIỂN</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-circle"></i>
                        <p>Tài khoản<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link">
                                <i class="fas fa-users-cog"></i>
                                <p>Ban quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-user"></i>
                                <p> Thành viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('chuc-vu') }}" class="nav-link">
                        <i class="fas fa-bookmark"></i>
                        <p>Chức vụ</p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="{{ route('phong-ban') }}" class="nav-link">
                        <i class="fas fa-person-booth"></i>
                        <p>Phòng ban</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cong-viec') }}" class="nav-link">
                        <i class="fas fa-bookmark"></i>
                        <p>Quản lý công việc</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-headset"></i>
                        <p>Hỗ trợ và liên hệ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>Hỗ trợ</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <p>Liên hệ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>Cấu hình website<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>Trang chủ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-align-justify"></i>
                        <p>Nội dung<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>Slide</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <p> Tin tức </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <p> Trang thông tin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

