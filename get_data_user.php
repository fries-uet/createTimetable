<?php
    include "backend/config.php";
    include "backend/dbconnect.php";
    function get_data_user($user, $pass){
        global $conn;
        $sql = "select pass from user WHERE name ='".$user."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            foreach ($result as $row){
                if($pass == $row['pass'])return "true";
                else return "false1";
            }
        }else {
            return "false2";
        }
    }
?>