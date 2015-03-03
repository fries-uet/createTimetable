<?php
/**
 * Created by PhpStorm.
 * User: Tu
 * Date: 03/3/2015
 * Time: 11:25 PM
 */

include("subject.php");
include("lesson.php");

//Tạo các đối tượng subject từ cơ sở dữ liệu
$s1 = new subject(1, "INT2203", "Công nghệ phần mềm", 3);
$s2 = new subject(2, "INT2204", "Mạng máy tính", 3);
$s3 = new subject(3, "MAT1102", "Toán rời rạc", 3);
$s4 = new subject(4, "PES2206", "Bóng rổ", 1);

//Nhét các subject vào 1 mảng
$arr = array();
array_push($arr, $s1);
array_push($arr, $s2);
array_push($arr, $s3);
array_push($arr, $s4);

//Nhét mảng trên vào 1 mảng $data theo cấu trúc như bên dưới
$data = array("data"=>$arr);

//In mã JSON của $data
print_r(json_encode($data));