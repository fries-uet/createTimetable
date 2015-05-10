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
function saveUser( $username, $password, $name ){
    global $conn;
    $password = md5( $password );
    $sql = "insert into nguoidung set email = '$username', pass = '$password', name = '$name'";
    mysqli_query( $conn, $sql );
    return true;
}

function echoJson($result, $notify = null) {
    echo json_encode(array("result" => $result, "notify" => $notify));
}
$user = ""; $pass = "";
if( isset( $_POST['user'] ) )
    $user = $_POST['user'];
if( isset( $_POST['pass'] ) )
    $pass = $_POST['pass'];

if ( $user != "" and $pass != "" ) {
    $check = checkUser($user);

    if($check == true) {
        echoJson(false, "Tài khoản này đã có người dùng!");
    } else {
        $passw = md5($pass);
        $sql = "insert into nguoidung set email = '$user', pass = '$passw'";
        mysqli_query( $conn, $sql );
        echoJson(true, "Đăng ký thành công!");
    }
}
else {
    echoJson(false);
}