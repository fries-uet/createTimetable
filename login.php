<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="login center-block">
        <form class="form-horizontal" role="form" method="post">
            <h3 class="col-sm-offset-4 col-sm-8">Đăng nhập tài khoản</h3>
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Username:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="user" placeholder="user name" name="user">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="pass">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <label>
                        <input type="checkbox" value="remember-me"> Ghi nhớ tôi
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-block btn-success">Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['user']) and isset($_POST['pass']) ){
    include "check_data_user.php";
}else {
//    echo "nhập đầy đủ thông tin đăng nhập !!!";
}
?>