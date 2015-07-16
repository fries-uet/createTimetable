<?php

include "../../../config.php";

$email = $_GET['email'];
if (!isset($email)) {
    echoJson(0);
} else {
    echoJson(validateEmail($email));
}

function checkUser($username) {
    global $conn;
    $sql = "select email from nguoidung where email = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    }

    return false;
}

function validateEmail($email) {
    $pos = strpos($email, "@");
    if ($pos == false) {
        return 0;
    }

    $domain = explode("@", $email, 2)[1];

    //Kiểm tra các kí tự đặc biệt không nên có
    $chars = "!@#$%^&*(),\/?;:'\"|+=-_<>";
    for ($i=0; $i < strlen($chars); $i++) {
        if (strpos($domain, $chars[$i]) != false) {
            return 0;
        }
    }

    $pos = strpos($domain, ".");
    if ($pos == false) {
        return 0;
    }

    //Kiểm tra xem có trong cơ sở dữ liệu hay khônng
    $check = checkUser($email);
    if ($check == true) {
        return 1;
    }

    return -1;
}

function echoJson($result) {
    if ($result == -1) {
        echo $result;
        return;
    }

    $arrNotify = array(
        "Email is not valid!",
        "Email has been registered!"
    );
    header("HTTP/1.0 404 " .  $arrNotify[$result]);
    return;
}

?>