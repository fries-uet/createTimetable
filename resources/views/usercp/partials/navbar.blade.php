<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">Create Timetable</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-left hidden-xs hidden-sm">
        <li>
            <a href="{{ route('main.home') }}"><i class="fa fa-plus fa-fw"></i> Tạo mới</a>
        </li>
    </ul>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Xin chào <b class="username">{{ session('username') }}</b> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user fa-fw"></i> Cá nhân</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('user.signout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Bảng điều khiển</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> Thời khóa biểu</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('user.timetable') }}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{ route('main.home') }}">Tạo mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Cá nhân</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('user.setting') }}">Thiết lập cá nhân</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>