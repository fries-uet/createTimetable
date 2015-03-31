<?php
// kết nối với database .....
$host     = "localhost";
$username = "root";
$password = "";
$database = "time_table";
$conn = mysqli_connect( $host, $username, $password, $database );
mysqli_query( $conn, "SET NAME 'utf8'" );
?>