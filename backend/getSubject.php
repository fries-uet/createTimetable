<?php
include "dbconnect.php";
include("Subject.php");
header('Content-Type:application/json; charset=UTF-8');
mysqli_query($conn, "SET NAMES 'utf8'");
$sql_getdata = "SELECT * FROM subject";
$result = mysqli_query($conn, $sql_getdata);
$arr =array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $s = new Subject(intval($row['subject_id']), $row['maMH'], $row['tenMH'], intval($row['soTin']));
        array_push($arr, $s);
    }
}
//Nhét mảng trên vào 1 mảng $data theo cấu trúc như bên dưới
$data = array("data"=>$arr);
//In mã JSON của $data
print_r(json_encode($data));
mysqli_close($conn);
?>
