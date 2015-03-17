<?php
    include "backend/config.php";
    include "backend/dbconnect.php";

    function get_data_user($user){
        global $conn;
        $sql = "select name from user WHERE name ='".$user."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            return false;
        }else {
            return true;
        }
    }
?>