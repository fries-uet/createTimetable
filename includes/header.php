<nav class="navbar navbar-fixed-top" style="background: #e3e3e3;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Create Timetable</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
<!--                <li><a href="#">Dashboard</a></li>-->
                <li class="dropdown" id="tool-user"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Công cụ <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="btn-save-table"><a href="#" >Lưu lại</a></li>
                        <li id="btn-share-table"><a href="#" >Chia sẻ</a></li>
                        <li id="btn-export-table"><a href="#" >Xuất file</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-target="#guide-user" data-toggle="modal" title="Xem hướng dẫn sử dụng ứng dụng"><span class="glyphicon glyphicon-bullhorn"></span> Trợ giúp</a></li>
                <li class="dropdown" id="signined" style="display: none;" data-target="out"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin chào <span id="hello-user"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="btn-edit-profile"><a href="/user/edit-profile.php">Chỉnh sửa</a></li>
                        <li class="divider"></li>
                        <li id="btn-signout"><a href="#" >Đăng xuất</a></li>
                    </ul>
                </li>
                <li id="btn-signup" style="display: none;"><a href="#" data-target="#form-signup" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Đăng kí</a></li>
                <li id="btn-signin" style="display: none;"><a href="#" data-target="#form-signin" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php include "form-signin.php"; ?>
<?php include "form-signup.php"; ?>
<?php include "guide.php"; ?>
