<?php
session_start();
include "../../config.php";
// lay password voi username nhap vao
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
        if ($name == "") {
            return $username;
        }
        return $name;
    }

    return "Bạn";
}

function echoJson($result) {
    echo json_encode(array("result" => $result));
}

if (isset($_POST['user']) and isset($_POST['pass'])) {
    $pass = getPassword($_POST['user']);
    if ($pass == false) {
        echoJson(false);
    } else {
        if (md5( $_POST['pass']) == $pass) {
            $_SESSION['user'] = getName($_POST['user']);
            echoJson(true);
        } else {
            echoJson(false);
        }
    }
}
else {
    echoJson(false);
}