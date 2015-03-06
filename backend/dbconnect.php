<?php
    include "config.php";
    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn)die("error ! connecting ". mysqli_error($conn));
?>