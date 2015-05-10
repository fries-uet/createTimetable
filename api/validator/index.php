<?php

$email = $_GET['email'];
if (!isset($email)) {
    echoJson(false);
} else {
    echoJson(validateEmail($email));
}

function validateEmail($email) {
    $pos = strpos($email, "@");
    if ($pos == false) {
        return false;
    }

    $domain = explode("@", $email, 2)[1];

    //Kiểm tra các kí tự đặc biệt không nên có
    $chars = "!@#$%^&*(),\/?;:'\"|+=-_<>";
    for ($i=0; $i < strlen($chars); $i++) {
        if (strpos($domain, $chars[$i]) != false) {
            return false;
        }
    }

    $pos = strpos($domain, ".");
    if ($pos == false) {
        return false;
    }

    return true;
}

function echoJson($result) {
    if ($result == false) {
        header("HTTP/1.0 404 Email is not valid!");
        return;
    }
    echo json_encode(["result" => $result]);
}

?>