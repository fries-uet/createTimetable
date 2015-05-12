<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user'];
        $name = $_SESSION['name'];
    } else {
        header("Location: ../");
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin cá nhân</title>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validator.js"></script>
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include "includes/nabar-top.php"; ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Bảng điều khiển</a>
                </li>
                <li class="active">
                    <a href="edit-profile.php"><i class="fa fa-fw fa-user"></i> Cá nhân</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Thông tin cá nhân
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Bảng điều khiển</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Cập nhật thông tin cá nhân
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">
                    <form role="form" data-toggle="validator" method="post" id="form-update-info">
                        <label class="h3">Tên</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            <input id="iput-email" type="text" class="form-control" placeholder="Email" disabled value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="input-name" type="text" class="form-control" placeholder="Họ và tên" value="<?php echo $name; ?>">
                        </div>

                        <label class="h3">Thay đổi mật khẩu</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="input-pass" type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu mới">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" data-match="#input-pass" data-match-error="Mật khẩu không trùng khớp">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-update-submit">Cập nhật</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="js/main.js"></script>

</body>
</html>