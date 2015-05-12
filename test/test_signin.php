<meta charset="UTF-8">
<?php
    include "../config.php";
    include "../api/sign/function.signin.php";
    $tong = 2;
    $true = 0;
    // du lieu da co tu phan test truoc ...
    $username = "test@gmail.com";
    $password = "123456";
    $name = "Nguyen Van A";
    // check lay password ....
    $password_true = md5($password);
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
    echo "<br> Tổng số test : ". $tong;
    echo "<br> Số test true : ". $true;
    echo "<br> Kết quả : ". ( $true / $tong * 100 ) . " % ";
?>
<br>
<br>
<a href="test_function.php">Back to main</a>