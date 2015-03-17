<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="signup center-block">
        <form class="form-horizontal" role="form" method="post" action="check_info_signup.php">
            <h3 class="col-sm-offset-4 col-sm-8">Đăng ký thành viên</h3>

            <div class="form-group">
                <label class="control-label col-sm-4" for="name">Tên tài khoản:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" placeholder="Tên tài khoản" name="name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="pass">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Địa chỉ email" name="email">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="def">Họ:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastname" placeholder="Họ và tên đệm" name="lastname">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="abc">Tên:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" placeholder="Tên" name="firstname">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-4" for="123">Ngày sinh:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="birth" placeholder="Ngày sinh" name="birth">
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-4" for="repwd">Gõ lại mật khẩu:</label>-->
<!--                <div class="col-sm-8">-->
<!--                    <input type="password" class="form-control" id="repwd" placeholder="Gõ lại mật khẩu">-->
<!--                </div>-->
<!--            </div>-->
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-block btn-success" id="register">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>

<?php
//    echo $_POST['error'];
?>
    <script src="js/jquery.min.js"></script>
    <script>
        //Kiểm tra mật khẩu có trùng khớp hay không?
        $('#register').click(function () {
            var pass = $('pwd').val();
            var repass = $('repwd').val();
            if (pass != repass) {
                alert("Pass không trùng khớp!");
            }
        });
    </script>
</div>
</body>
</html>