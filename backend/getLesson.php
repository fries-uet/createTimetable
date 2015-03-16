<?php
/**
 * Created by PhpStorm.
 * User: tu
 * Date: 17/03/2015
 * Time: 00:48
 */

include "dbconnect.php";
include("lesson.php");
header('Content-Type:application/json; charset=UTF-8');
mysqli_query($conn, "SET NAMES 'utf8'");
$sql_getdata = "SELECT * FROM lesson";
$result = mysqli_query($conn, $sql_getdata);
$arr =array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $l = new lesson($row['subject_id'], $row['maLMH'], $row['nhom'], $row['viTri'], $row['soTiet'], $row['giaoVien'], $row['giangDuong']);
        array_push($arr, $l);
    }
}
//Nhét mảng trên vào 1 mảng $data theo cấu trúc như bên dưới
$data = array("data"=>$arr);
//In mã JSON của $data
print_r(json_encode($data));
mysqli_close($conn);
?>
