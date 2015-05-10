<?php

include "../../config.php";
function checkUser($username) {
    global $conn;
    $sql = "select email from nguoidung where email = '$username'";
    $result = mysqli_query( $conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    }

    return false;
}

function echoJson($result, $notify = null) {
    echo json_encode(array("result" => $result, "notify" => $notify));
}

$user = $_POST['user'];
$pass = $_POST['pass'];

if (isset($user) and isset($pass)) {
    $check = checkUser($user);

    if($check == true) {
        echoJson(false, "Tài khoản này đã có người dùng!");
    } else {
        $password = md5($pass);
        $sql = "insert into nguoidung set email = '$user', pass = '$pass'";
        mysqli_query( $conn, $sql );
        echoJson(true, "Đăng ký thành công!");
    }
}
else {
    echoJson(false);
}