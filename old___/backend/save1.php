<?php
include "../config.php";

    // kiểm tra thông tin rồi đẩy lên database ....
    if( check() ){
        global $conn;
        $maMH = get_maMH( $_POST['maMH'] );
        if( check_subAlive( $maMH ) == false ) {
            $sql_subject = "insert into subject( tenMH, maMH, soTin )
                            VALUES (
                                '" . $_POST['tenMH'] . "',
                                '" . $maMH . "',
                                " . $_POST['soTin'] . "
                            )";

            $s1 = mysqli_query($conn, $sql_subject);
        }
        if( check_lesAlive( $_POST['maMH'] ) == false ) {
            $sql_lesson = "insert into lesson( sub_id, giaoVien, soTiet, maLMH, nhom, viTri, giangDuong )
                            VALUES (
                                '" . get_subId($maMH) . "',
                                '" . $_POST['giaoVien'] . "',
                                '" . get_soTiet($_POST['start'], $_POST['end']) . "',
                                '" . $_POST['maMH'] . "',
                                '" . $_POST['nhom'] . "',
                                '" . get_viTri($_POST['day'], $_POST['start'], $_POST['end']) . "',
                                '" . $_POST['giangDuong'] . "'
                            )";
            $s2 = mysqli_query($conn, $sql_lesson);
            echo "save successfully....";
        } else{
                echo "save rồi còn bấm lại làm cái mẹ gì...";
        }


    }

    // kiểm tra xem có thông tin hay chưa  .....
    function check(){
        if( !isset ( $_POST['tenMH'] )) return false;
        if( !isset ( $_POST['maMH'] )) return false;
        if( !isset ( $_POST['giaoVien'] )) return false;
        if( !isset ( $_POST['soTin'] )) return false;
        if( !isset ( $_POST['nhom'] )) return false;
        if( !isset ( $_POST['giangDuong'] )) return false;
        if( !isset ( $_POST['day'] )) return false;
        if( !isset ( $_POST['start'] )) return false;
        if( !isset ( $_POST['end'] )) return false;
        return true;
    }
    // tính vi trí ....
    function get_viTri($day, $start, $end){
        $result = ( $day - 2 ) * 10 + $start;
        return $result;
    }
    // lấy mã môn học học cho subject ...
    function get_maMH($maLMH){
        $str_tok = strtok( $maLMH, " _" );
        $maLMH2 = "";
        while ( $str_tok !== false ){
            $maLMH2 .= $str_tok;
            $str_tok = strtok (" _");
        }
        $result = "";
        for( $i = 0; $i < 7; $i++ ){
            $result .= $maLMH2[$i];
        }
        return $result;
    }
    // lấy số tiêt.....
    function get_soTiet( $start, $end ){
        return ( $end - $start + 1 );
    }
    // lấy subject id from database ....

    function get_subId( $maMH ){
        global $conn;
        $sql = "select id from subject WHERE maMH = '".$maMH."'";
        $result = mysqli_query( $conn, $sql );
        if( mysqli_num_rows( $result ) > 0 ){
            while( $row = mysqli_fetch_array( $result, MYSQL_ASSOC ) ){
                return $row['id'];
            }
        }
    }
    function check_subAlive( $maMH ){
        global $conn;
        $sql = "select id from subject WHERE maMH = '".$maMH."'";
        $result = mysqli_query( $conn, $sql );
        if( mysqli_num_rows( $result ) > 0 ){
            return true;
        } else {
            return false;
        }
    }
    function check_lesAlive( $maLMH ){
        global $conn;
        $sql = "select id from lesson WHERE maLMH = '".$maLMH."'";
        $result = mysqli_query( $conn, $sql );
        if( mysqli_num_rows( $result ) > 0 ){
            return true;
        } else {
            return false;
        }
    }
?>