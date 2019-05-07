<?php
include("connect.php");
$pass = "1234";
$strsql = "INSERT INTO user VALUES('','test','".md5($pass)."','sawanon','wattanasit','sawanon01@hotmail.com','1')";
$query = $conn->query($strsql);
 ?>
