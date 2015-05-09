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

function echoJson($result) {
    echo json_encode(array("result" => $result));
}

if (isset($_POST['user']) and isset($_POST['pass'])) {
    $check = checkUser($_POST['user']);
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if($check == true) {
        echoJson(false);
    } else {
        $password = md5( $password );
        $sql = "insert into nguoidung set email = '$username', pass = '$password'";
        mysqli_query( $conn, $sql );
        echoJson(true);
    }
}
else {
    echoJson(false);
}