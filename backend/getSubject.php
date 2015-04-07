<?php
    include "Subject.php";
    include "../config.php";
    $arr = array();
    $sql = "select * from subject";

    $result = mysqli_query( $conn, $sql );
    if( mysqli_num_rows( $result ) > 0 ){
        while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
            $subject = new Subject(
                intval($row['id']), $row['maMH'], $row['tenMH'], intval($row['soTin']));
            array_push( $arr, $subject );
        }
    }
    include("echoJson.php");
    echoJson($arr);
?>