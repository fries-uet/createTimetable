<?php
    include"signup_function.php";
    if (get_data_user($_POST['name'])){
        $sql_insert = "INSERT INTO user(name, email, pass, lastname, fistname, birth) VALUES ('".$_POST['name']."','".$_POST['email']."', '".$_POST['pass']."', '".$_POST['lastname']."', '".$_POST['firstname']."', ".$_POST['birth']." )";
        $result = mysqli_query($conn, $sql_insert);
        //echo "save data successfully";
        mysqli_close($conn);
        echo "Tai khoan dang ki thanh cong!";
    } else{
        $_POST['error'] = "Tai khoan da co nguoi dang ki";
        header("location:signup.php");
        //echo "Tai khoan da co nguoi dk";
    }
?>