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
                        <li id="btn-save-table"><a href="javascript:void();" >Lưu lại</a></li>
                        <li id="btn-share-table"><a href="javascript:void();" >Chia sẻ</a></li>
                        <li id="btn-export-table"><a href="javascript:void();" >Xuất file</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="signined" style="display: none;" data-target="out"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin chào <span id="hello-user"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Chỉnh sửa</a></li>
                        <li id="btn-signout"><a href="javascript:void();" >Đăng xuất</a></li>
                    </ul>
                </li>
                <li id="btn-signup" style="display: none;"><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng kí</a></li>
                <li id="btn-signin" style="display: none;"><a href="#" data-target="#form-signin" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                <li><a href="#" title="Xem hướng dẫn sử dụng ứng dụng"><span class="glyphicon glyphicon-bullhorn"></span> Trợ giúp</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php include "form-signin.php"; ?>
