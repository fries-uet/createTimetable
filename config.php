<?php
// kết nối với database .....
$host     = "localhost";
$username = "root";
$password = "";
$database = "create_timetable";
$conn = mysqli_connect( $host, $username, $password, $database );
mysqli_query( $conn, "SET NAMES 'utf8'" );
?>