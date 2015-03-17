<?php
    include "dbconnect.php";
    mysqli_query($conn, "SET NAMES 'utf8'");
    $check1 =(isset($_POST['maMH']) and isset($_POST['tenMH'])and isset($_POST['soTin']))?"true":"false";
    $check2 =($_POST['maMH']!=""and $_POST['tenMH']!=""and $_POST['soTin']!="")?"true":"false";
    if ($check1=="true"and $check2=="true") {
        $sql_insert = "INSERT INTO subject(maMH, tenMH, soTin) VALUES ('".$_POST['maMH']."','".$_POST['tenMH']."',".$_POST['soTin'].")";
        $result = mysqli_query($conn, $sql_insert);
        echo "save data successfully";
    }
    mysqli_close($conn);
?>