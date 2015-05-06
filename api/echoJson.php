<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type:application/json; charset=UTF-8');
    function echoJson($data) {
        print_r(json_encode($data));
    }
?>