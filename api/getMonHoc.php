<?php

include("MonHoc.php");
include("LopMH.php");
include("BuoiHoc.php");
include("echoJson.php");
include "../config.php";

$arr = array();

$sql = "select * from monhoc";
$result = mysqli_query( $conn, $sql );
if( mysqli_num_rows( $result ) > 0 ){
    while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
        $id = intval($row['id']);
        $tenMH = $row['tenMH'];
        $maMH = $row['maMH'];
        $soTin = intval($row['soTin']);
        $lopMH = array();

        array_push( $arr, $subject );
    }
}
include("echoJson.php");
echoJson($arr);

?>