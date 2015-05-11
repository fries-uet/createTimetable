<?php
    include "../config.php";
    include "../api/sign/function.signup.php";
    $tong = 2;
    $true = 0;
    // khoi tao du lieu ...
    $username = "test@gmail.com";
    $password = "123456";
    $name = "Nguyen Van A";
    $sql = "DELETE FROM nguoidung WHERE email = '$username'";
    $r = mysqli_query($conn, $sql);

    // luu vao database...
    $save = saveUser( $username, $password, $name );
    if( $save == true ){
        echo "<br> test 01 signup : true";
        $true++;
    } else {
        echo "<br> test 01 signup : false";
    }
    // check su ton tai cua username ....
    $username_check_01 = "test@gmail.com";
    $username_check_011 = "test_1@gmail.com";
    $checkUser_01 = checkUser( $username_check_01 );
    $checkUser_011 = checkUser( $username_check_011 );
    if( $checkUser_01 == true and $checkUser_011 == false ){
        echo "<br> test 02 signup : true";
        $true++;
    } else {
        echo "<br> test 02 signup : false";
    }
    echo "<br> Tong so test : ". $tong;
    echo "<br> So test true : ". $true;
    echo "<br> Ket qua : ". ( $true / $tong * 100 ) . " % ";

?>
<br>
<br>
<a href="test_function.php"> back to main </a>