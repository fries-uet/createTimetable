<?php
    session_start();
    $user = $_SESSION['user'];
    if (!isset($user)) {
        echoJson(false);
    } else {
        $name = $_SESSION['name'];
        echoJson(true, $user, $name);
    }
    function echoJson($status, $user = null, $name = null) {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json; charset=UTF-8');
        echo json_encode(["status" => $status, "user" => $user, "name" => $name]);
    }
?>
