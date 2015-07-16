<?php

include "../../config.php";
include "function.signup.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

if (isset($user) and isset($pass)) {
    $check = checkUser($user);

    if($check == true) {
        echoJson(false, "Tài khoản này đã có người dùng!");
    } else {
        $password = md5($pass);
        $sql = "insert into nguoidung set email = '$user', pass = '$password'";
        mysqli_query( $conn, $sql );
        echoJson(true, "Đăng ký thành công!");
    }
}
else {
    echoJson(false);
}