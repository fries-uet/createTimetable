<?php
    include "../config.php";
    function checkUser( $username ){
        global $conn;
        $sql = "select email from nguoidung where email = '$username'";
        $result = mysqli_query( $conn, $sql );
        if( mysqli_num_rows( $result ) > 0 ){
//            echo "true";
            return true;
        }
//        echo "false";
        return false;
    }
    if( isset( $_POST['username'] ) and isset( $_POST['password'] ) ){
        $check = checkUser( $_POST['username'] );
        $username = $_POST['username'];
        $password = $_POST['password'];
        if( $check == true ){
            header("location:index.php");
        } else{
            if( $password != "" ){
                $password = md5( $password );
                $sql = "insert into nguoidung set email = '$username', pass = '$password'";
                mysqli_query( $conn, $sql );
                header("location:../signup/");
            } else {
                header("location:index.php");
            }

        }
    } else {
        header("location:index.php");
    }
?>