<?php
$server = "localhost:3307"; 
$user = "root";
$pass = "";
$db = "udn";

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_query($con, "SET NAMES 'utf8'");
?>
