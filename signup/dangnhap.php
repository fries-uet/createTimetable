<?php
    include "../config.php";
    // lay password voi username nhap vao
    function getPassword( $username ){
        global $conn;
        $sql = "select pass from nguoidung where email = '$username'";
        $result = mysqli_query( $conn, $sql );
        if( mysqli_num_rows( $result ) > 0 ){
            $row = mysqli_fetch_array( $result, MYSQL_ASSOC );
            $pass = $row['pass'];
            return $pass;
        } else return false;
    }
    if( isset( $_POST['username'] ) and isset( $_POST['password'] ) ){
        $pass = getPassword( $_POST['username'] );
        if( $pass == false ){
            header("location:index.php");
        } else{
            echo $pass;
            if( md5( $_POST['password'] ) == $pass ){
                header("location:../index.php");
            } else {
                header("location:index.php");
            }
        }
    }

?>