<?php
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

    return $username;
}

function echoJson($result, $notify = null) {
    echo json_encode(array("result" => $result, "notify" => $notify));
}