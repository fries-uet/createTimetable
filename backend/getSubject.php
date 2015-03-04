<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body></body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Tu
 * Date: 03/3/2015
 * Time: 11:25 PM
 */
include("subject.php");
include("lesson.php");
// thong tin localhost
$host = "localhost";
$user = "root";
$pass = "";
$db = "time_table";
//Tạo các đối tượng subject từ cơ sở dữ liệu
// connecting database
$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
    die("error ! < connecting database> ". mysqli_error($conn));
}
// get data from database "time_table"
$get_data = "SELECT subject_id, maMH, tenMH, soTin FROM subject";
$result = mysqli_query($conn, $get_data);
// tạo oject "subject" tự động từ database
$arr = array();
$sl = mysqli_num_rows($result);
$i = 0;
$id = 0;
$maMH = "";
$tenMH = "";
$soTin = 0;
if($sl>0){
    while($i<$sl){
        $row = mysqli_fetch_assoc($result);
        $id = $row['subject_id'];
        $maMH = $row['maMH'];
        $tenMH = $row['tenMH'];
        $soTin = $row['soTin'];
        $s = new subject($id, $maMH, $tenMH, $soTin);
        array_push($arr, $s);
        $i++;
    }
}
//Nhét mảng trên vào 1 mảng $data theo cấu trúc như bên dưới
$data = array("data"=>$arr);
//In mã JSON của $data
print_r(json_encode($data));
?>
