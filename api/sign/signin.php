<?php
session_start();
include "../../config.php";
include "function.signin.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

if (isset($user) and isset($pass)) {
    $passw = getPassword($user);
    if ($passw == false) {
        echoJson(false, "Không tồn tại người dùng này!");
    } else {
        if (md5($pass) == $passw) {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $passw;
            $_SESSION['name'] = getName($user);
            echoJson(true, "Đăng nhập thành công!");
        } else {
            echoJson(false, "Tài khoản hoặc mật khẩu không đúng!");
        }
    }
}
else {
    echoJson(false);
}