<?php
    // class lay mon hoc tu subject va lesson
    include "../config.php";
    include "MonHoc.php";
    $sql_lesson = "select * from lesson";
    $result = mysqli_query( $conn, $sql_lesson );
    $arr = array();
    if( mysqli_num_rows( $result ) > 0 ){
        while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
            $sql_subject = "select tenMH, soTin from subject WHERE id = '".$row['sub_id']."'";
            $sub = mysqli_query( $conn, $sql_subject );
            while( $row1 = mysqli_fetch_array( $sub, MYSQL_ASSOC ) ){
                $tenMH = $row1['tenMH'];
                $soTin = $row1['soTin'];
            }
            $thu = 0; $start = 0; $end = 0;
            chuyenDoi( $row['viTri'], $row['soTiet'] );
            $monhoc = new MonHoc(
                $tenMH, $row['maLMH'], $row['giaoVien'], $row['giangDuong'], $soTin, $row['nhom'], $thu, $start, $end
            );
            array_push( $arr, $monhoc );
        }
        print_r( json_encode( $arr ) );
//        print_r( $arr );
    }

    function chuyenDoi( $viTri, $soTiet ){
        global $thu, $start, $end;
        switch ($viTri){
            case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8 :case 9:case 10:
                $thu = 2;
                $start = $viTri - ( ( $thu - 2 ) * 10 );
                $end = $start + $soTiet - 1;
                break;
            case 11:case 12:case 13:case 14:case 15:case 16:case 17:case 18 :case 19:case 20:
                $thu = 3;
                $start = $viTri - ( ( $thu - 2 ) * 10 );
                $end = $start + $soTiet - 1;
                break;
            case 21:case 22:case 23:case 24:case 25:case 26:case 27:case 28 :case 29:case 30:
                $thu = 4;
                $start = $viTri - ( ( $thu - 2 ) * 10 );
                $end = $start + $soTiet - 1;
                break;
            case 31:case 32:case 33:case 34:case 35:case 36:case 37:case 38 :case 39:case 40:
                $thu = 5;
                $start = $viTri - ( ( $thu - 2 ) * 10 );
                $end = $start + $soTiet - 1;
                break;
            case 41:case 42:case 43:case 44:case 45:case 46:case 47:case 48 :case 49:case 50:
                $thu = 6;
                $start = $viTri - ( ( $thu - 2 ) * 10 );
                $end = $start + $soTiet - 1;
                break;
//            case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 58 :case 59:case 60:
//                $thu = 2;
//                $start = $viTri - ( ( $thu - 2 ) * 10 );
//                $end = $start + $soTiet;
//                break;
        }
    }

?>