<?php
session_start();
include "../../config.php";

function getPassword($username) {
    global $conn;
    $sql = "select pass from nguoidung where email = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result ) > 0) {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $pass = $row['pass'];
        return $pass;
    }

    return false;
}

function getName($username) {
    global $conn;
    $sql = "select name from nguoidung where email = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result ) > 0) {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $name = $row['name'];
        return $name;
    }
;
}

function echoJson($result, $notify = null) {
    echo json_encode(array("result" => $result, "notify" => $notify));
}

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