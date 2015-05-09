<?php
    session_start();
    $user = $_SESSION['user'];
    if (!isset($user)) {
        echoJson(false);
    } else {
        echoJson(true, $user);
    }
    function echoJson($status, $user = null) {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json; charset=UTF-8');
        echo json_encode(["status" => $status, "user" => $user]);
    }
?>
