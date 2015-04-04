<?php
    include "Subject.php";
    include "../config.php";
    $arr = array();
    $sql = "select * from subject";

    $result = mysqli_query( $conn, $sql );
    if( mysqli_num_rows( $result ) > 0 ){
        while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
            $subject = new Subject(
                $row['id'], $row['maMH'], $row['tenMH'], $row['soTin']
            );
            array_push( $arr, $subject );
        }
    }
    print_r( json_encode ( $arr ) );
?>