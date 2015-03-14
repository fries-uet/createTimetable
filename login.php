<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="login center-block">
        <form class="form-horizontal" role="form">
            <h3 class="col-sm-offset-4 col-sm-8">Đăng nhập tài khoản</h3>
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