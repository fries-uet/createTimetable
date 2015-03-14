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
        <form class="form-horizontal" role="form">
            <h3 class="col-sm-offset-4 col-sm-8">Đăng ký thành viên</h3>
            <div class="form-group">
                <label class="control-label col-sm-4" for="name">Tên đầy đủ:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Địa chỉ email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu">
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