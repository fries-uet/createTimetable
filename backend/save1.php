<meta charset="utf-8">
<?php
    include "../config.php";
    echo $_POST['tenMH']."<br>";
    echo $_POST['maMH']."<br>";
    echo $_POST['tenGV']."<br>";
    echo $_POST['soT']."<br>";
    echo $_POST['optradio']."<br>";
    echo $_POST['thu']."<br>";
    echo $_POST['tietS']."<br>";
    echo $_POST['tietE']."<br>";





    $result = mysqli_query($conn, "select * from subject");
    if( mysqli_num_rows( $result ) >0 ){
        while( $row = mysqli_fetch_assoc( $result ) ){
            echo $row['tenMH']." : ".$row['maMH']."<br>";
        }
    }
    mysqli_close($conn);
?>