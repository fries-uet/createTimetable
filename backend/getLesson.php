<?php
    include "Lesson.php";
    include "../config.php";
    $arr = array();
    $sql = "select maLMH, nhom, viTri, soTiet, giaoVien, giangDuong from lesson";

    $result = mysqli_query( $conn, $sql );
    if( mysqli_num_rows( $result ) > 0 ){
        while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
            $lesson = new Lesson(
                $row['maLMH'], $row['nhom'], $row['viTri'], $row['soTiet'], $row['giaoVien'], $row['giangDuong']
                    );
            array_push( $arr, $lesson );
        }
    }

    include("echoJson.php");
    echoJson($arr);
?>