<?php
/**
 * Created by PhpStorm.
 * User: tu
 * Date: 10/05/2015
 * Time: 17:04
 */

session_start();
include "../../config.php";

$email = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$passOld = $_SESSION['pass'];
$user = $_SESSION['user'];

if (isset($user)) {
    global $conn;
    if ($pass == "") {
        $passNew = $passOld;
    } else {
        $passNew = md5($pass);
    }
    $sql = "UPDATE nguoidung SET name = '$name', pass = '$passNew' WHERE email = '$user'";
    $result = mysqli_query($conn, $sql);

    //Update session
    $_SESSION['name'] = $name;
    $_SESSION['pass'] = $passNew;

    echoJson(true, "Update thành công");
} else {
    echoJson(false);
}

function echoJson($resutl, $notify = null) {
    echo json_encode(["result" => $resutl, "notify" => $notify]);
}