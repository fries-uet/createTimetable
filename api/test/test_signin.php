<?php
    include "../sign/signin.php";
    $tong = 2;
    $true = 0;
    // du lieu da co tu phan test truoc ...
    $username = "test_01@gmail.com";
    $password = "123";
    $name = "Nguyen Van A";
    // check lay password ....
    $password_true = "202cb962ac59075b964b07152d234b70";
    $password_check = getPassword( $username );
    if( $password_check == $password_true ){
        echo "<br> test 01 signin : true";
        $true++;
    } else {
        echo "<br> test 01 signup : false";
    }
    $name_check = getName( $username );
    if( $name_check == $name ){
        echo "<br> test 02 signin : true";
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