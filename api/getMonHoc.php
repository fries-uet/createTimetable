<?php

include("MonHoc.php");
include("LopMH.php");
include("BuoiHoc.php");
include("echoJson.php");
include "../config.php";

$ds_monhoc = array();

$sql = "select * from monhoc";
$result = mysqli_query( $conn, $sql );
if( mysqli_num_rows( $result ) > 0 ){
    while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
        $id = intval($row['id']);
        $tenMH = $row['tenMH'];
        $maMH = $row['maMH'];
        $soTin = intval($row['soTin']);
        $ds_lopMH = array();

        $sql_lmh = "select * from lopmh where sub_id = $id";
        $result_lmh = mysqli_query( $conn, $sql_lmh );
        while( $row_lmh = mysqli_fetch_array( $result_lmh, MYSQL_ASSOC ) ){
            $id_lmh = $row_lmh['id'];
            $ma_lmh = $row_lmh['maLMH'];
            $ds_buoi = json_decode( $row_lmh['danhSach'] );//Theo id
            $ds_buoi2 = array();//Theo Ojbect
            foreach( $ds_buoi as $b ){
                $sql_buoi = "select * from buoihoc WHERE id = $b";
                $result_buoi = mysqli_query( $conn, $sql_buoi );
                $row_buoi = mysqli_fetch_array( $result_buoi, MYSQL_ASSOC );
                $buoi = new BuoiHoc( $b, intval($row_buoi['nhom']), intval($row_buoi['viTri']), intval($row_buoi['soTiet']),
                    $row_buoi['giaoVien'], $row_buoi['giangDuong'] );
                array_push($ds_buoi2, $buoi);
            }
            $lmh = new LopMH( $id_lmh, $ma_lmh, $ds_buoi2);
            array_push($ds_lopMH, $lmh);
        }

        $monhoc = new MonHoc($id, $maMH, $tenMH, $soTin, $ds_lopMH);
        array_push($ds_monhoc, $monhoc);

//        print_r($monhoc);
    }
}

header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');
print_r(json_encode($ds_monhoc));
?>