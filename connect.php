<?php
$host = "localhost";
$root = "root";
$pass = "88888888";
$db = "bookcartest";
$conn = new mysqli($host,$root,$pass,$db);
mysqli_set_charset($conn,"utf8");
if (!$conn) {
  echo "Nooo";
}
 ?>
