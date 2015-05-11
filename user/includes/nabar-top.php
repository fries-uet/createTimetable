<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../">Create Timetable</a>
</div>

<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <strong><?php echo $name; ?></strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="edit-profile.php"><i class="fa fa-fw fa-gear"></i> Chỉnh sửa</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="../api/sign/signout.php"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a>
            </li>
        </ul>
    </li>
</ul>