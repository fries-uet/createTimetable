<?php

function checkUser($username) {
    global $conn;
    $sql = "select email from nguoidung where email = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    }

    return false;
}

function echoJson($result, $notify = null) {
    echo json_encode(array("result" => $result, "notify" => $notify));
}

function saveUser($username, $password, $name) {
    global $conn;
    $password = md5($password);
    $sql = "insert into nguoidung set email = '$username', pass = '$password', name = '$name'";
    mysqli_query($conn, $sql);
    return true;
}